<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Sala;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Pest\Laravel\json;

class ReservaController extends Controller
{
    public function index(){
        //mostrar
        $user = auth()->user();
        $reservas = $user->reservas;

       return view('reservas.index', compact('reservas' , 'user'));
    }
    public  function new()
    {
        return view('reservas.new');
    }
    public function store(Request $request)
    {
        $sala_id = $request->input('sala_id');
        $fecha = $request->input('fecha');
        $hora = $request->input('hora');
        $num_personas = $request->input('num_personas');
        $telefono = $request->input('telefono');

        Reserva::create([ 'sala_id' => $sala_id,
            'fecha' => $fecha,
            'hora' => $hora,
            'user_id' => auth()->id(),
            'numpersonas' => $num_personas,
            'telefono' => $telefono,
            'estado' => 'pendiente']);

        return redirect()->route('mis_reservas');
    }
    public function buscarDisponibilidad(Request $request)  {
        //Validar datos del formulario
        $request->validate([
            'fecha' => 'required|date|after_or_equal:today',
            'hora' => 'required',
            'personas' => 'required|integer|min:1',
            'telefono' => 'required|string|min:9'
        ]);

        $fecha = $request->input('fecha');
        $hora = $request->input('hora');
        $num_personas = $request->input('personas');
        $telefono = $request->input('telefono');

        //Lógica para buscar disponibilidad de salas
        // Obtener todas las salas
        $salas = Sala::where('capacidad' , '>=' , $num_personas)
            ->where('capacidad' , '<=' , (2+$num_personas))->get();

        // Filtrar salas ocupadas en esa fecha y hora
        $ocupadas = Reserva::where('fecha', $fecha)
            ->where('hora', $hora)
            ->pluck('sala_id')  // Obtener solo los IDs de las salas ocupadas
            ->toArray();

        // salas libres
        $libres = $salas->whereNotIn('id', $ocupadas);

        return view('reservas.search' , compact('libres', 'telefono','salas', 'fecha', 'hora', 'num_personas'));


    }
    public function cancelar($reserva) {
        $reserva = Reserva::findOrFail($reserva);
        //Verificar que la reserva pertenece al usuario logueado
        if (!auth()->user()->admin) {
            if ($reserva->user_id != auth()->id()) {
                abort(403);
            }

        }

        $reserva->estado = 'cancelada';
        $reserva->save();

        if (auth()->user()->admin) {
            return redirect()->route('reservas.pendientes');
        } else {
            return redirect()->route('mis_reservas');
        }
    }

    /**
     * Solo puede confirmar reservas el usuario administrador
     * @param $reserva
     * @return \Illuminate\Http\RedirectResponse
     */
    public function confirmar($reserva) {
        $reserva = Reserva::findOrFail($reserva);

        //Mejor hacerlo con policies
        //Verificar que la reserva pertenece al usuario logueado
        if (!auth()->user()->admin) {
            abort(403);
        }

        if ($reserva->estado == 'pendiente') {
            $reserva->estado = 'confirmada';
            $reserva->save();
        }

        return redirect()->route('reservas.pendientes');
    }
    public function pendientes() {
        $reservas = Reserva::where('fecha', '>=', now()->toDateString())->get();
        return view('reservas.pendientes', compact('reservas'));
    }

    public function filtrar(Request $request) {
        $fecha = $request->input('fecha');
        $estado = $request->input('estado');

        if ($estado == 'todas') {
            $estados = ['pendiente', 'confirmada', 'cancelada'];
            $reservas = Reserva::where('fecha', '=', $fecha)->
            whereIn('estado', $estados)->get();
        } else {
            $reservas = Reserva::where('fecha', '=', $fecha)->
            where('estado','=',$estado)->get();
        }

        return view('reservas.pendientes', compact('reservas'));
    }
    public function apiNewReserva(Request $request)
    {
      $sala_id = $request->input('sala_id');
      $fecha = $request->input('fecha');
      $hora = $request->input('hora');
      $numpersonas = $request->input('numpersonas');
      $telefono = $request->input('telefono');
      $user_id = $request->input('user_id');

     $reservasOcupada =  DB::table('reservas')->where('sala_id', $sala_id)
          ->where('fecha', $fecha)
          ->where('hora', $hora)
           ->first();

      if ($reservasOcupada) {
          return response()->json([
              "message" => "Ya existe una reserva para este sala",
              "error" =>1
          ]);
      }
      $sala = Sala::findOrFail($sala_id);
      if (($sala->capacidad < $numpersonas) || (($sala->capacidad - $numpersonas) > 2)) {
          return response()->json([
              "mensaje" => "sala de tamaño ",
              "error" =>1
          ]);

      }

        $reserva = Reserva::create(['sala_id' => $sala_id,
            'fecha' => $fecha,
            'hora' => $hora,
            'user_id' => $user_id,
            'numpersonas' => $numpersonas,
            'telefono' => $telefono,
            'estado' => 'pendiente']);
        return $reserva->toResource();

    }
    public function apiUpdateReserva($id)
    {
        $reserva = Reserva::findOrFail($id);

        $reserva = Reserva::findOrFail($id);
        if (!$reserva->user_id == auth()->id() || !auth()->admin){
            abort(403);
        }
        $reserva->estado = 'cancelada';
        $reserva->save();

        return $reserva->toResource();
    }
    public function apiDeleteReserva($id)
    {
        $reserva = Reserva::findOrFail($id);
        if (!$reserva->user_id == auth()->id() || !auth()->admin){
            abort(403);
        }
        $reserva->delete();
        return response()->json([
            "mensaje" => "Reserva eliminada",
            "reserva" =>$reserva->toResource()
        ]);
    }

}
