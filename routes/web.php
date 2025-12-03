<?php

use App\Http\Controllers\ReservaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['auth'])->group(function () {

    Route::get('/home', function () {
        return view('home');
    })->name('home');
    Route::get('/mis_reservas', [ReservaController::class , 'index'])->name('mis_reservas');
    Route::get('/nueva_reserva', [ReservaController::class , 'new'])->name('nueva_reserva');
    //Buscar disponibilidad para una nueva reserva
    Route::post('/buscar-disponibilidad', [ReservaController::class, 'buscarDisponibilidad'])->name('reservas.buscar');

});
