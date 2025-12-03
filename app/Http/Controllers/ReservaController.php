<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Sala;
use Illuminate\Http\Request;

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
    public function store()
    {
        echo "Crear reserva";
    }
    public function buscarDisponibilidad(Request $request)  {
        //Validar datos del formulario
        $request->validate([
            'fecha' => 'required|date|after_or_equal:today',
            'hora' => 'required',
            'personas' => 'required|integer|min:1',
        ]);

        $fecha = $request->input('fecha');
        $hora = $request->input('hora');
        $num_personas = $request->input('personas');

        //Lógica para buscar disponibilidad de mesas
        // Obtener todas las mesas
        $salas = Sala::where('capacidad' , '>=' , $num_personas)
            ->where('capacidad' , '<=' , (2+$num_personas))->get();

        // Filtrar mesas ocupadas en esa fecha y hora
        $ocupadas = Reserva::where('fecha', $fecha)
            ->where('hora', $hora)
            ->pluck('sala_id')  // Obtener solo los IDs de las mesas ocupadas
            ->toArray();

        // Mesas libres
        $libres = $salas->whereNotIn('id', $ocupadas);

        return view('reservas.search' , compact('libres', 'salas', 'fecha', 'hora', 'num_personas'));


    }

}
