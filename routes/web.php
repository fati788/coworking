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
    Route::get('/nueva-reserva', [ReservaController::class, 'new'])->name('reservas.nueva');
    //Buscar disponibilidad para una nueva reserva
    Route::post('/buscar-disponibilidad', [ReservaController::class, 'buscarDisponibilidad'])->name('reservas.buscar');
    Route::post('/reservas', [ReservaController::class, 'store'])->name('reservas.store');

    //Cancelar una reserva
    Route::get('/reservas/{reserva}/cancelar', [ReservaController::class, 'cancelar'])->name('reservas.cancelar');
});
Route::middleware(['auth', 'admin'])->group(function () {
   //reviasr reservas
    Route::get('/reservas/pendientes', [ReservaController::class, 'pendientes'])->name('reservas.pendientes');
    Route::get('/reservas/filtrar', [ReservaController::class, 'filtrar'])->name('reservas.filtrar');
    Route::get('/reservas/{reserva}/confirmar', [ReservaController::class, 'confirmar'])->name('reservas.confirmar');
});


