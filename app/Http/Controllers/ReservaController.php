<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
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
}
