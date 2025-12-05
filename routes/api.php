<?php

use App\Http\Controllers\ReservaController;
use App\Http\Resources\ReservaResource;
use App\Http\Resources\SalaResource;
use App\Models\Reserva;
use App\Models\Sala;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
//
Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    //Comprobar credenciales
    if (!Auth::attempt($credentials)) {
        abort(401);
    }

    //Generar token
    $token = Auth::user()->createToken('my-app-token')->plainTextToken;
    return response()->json(['token' => $token, 'user' => Auth::user()]);
});
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/salas' , function(){
        return SalaResource::collection(Sala::all());
    });

    Route::get('/salas/{id}' , function(string $id){
        return new SalaResource(Sala::findOrFail($id));
    });

    Route::get('/reservas/admin' , function(){
        if (auth()->user()->admin)
            return Reserva::all()->toResourceCollection();
        else
            abort(401);


    });
    Route::get('/reservas' , function(){
        return Reserva::where('user_id', '=',auth()->id())->get()->toResourceCollection();

    });

    Route::get('/reservas/{id}' , function(string $id){
        $reserva = Reserva::findOrFail($id);
        if ($reserva->user_id == auth()->id()){
            return $reserva->toResource();
        }else{
            abort(403);
        }

    });

    Route::post('/reservas', [ReservaController::class, 'apiNewReserva']);
    Route::put('/reservas/{id}', [ReservaController::class, 'apiUpdateReserva']);
    Route::delete('/reservas/{id}', [ReservaController::class, 'apiDeleteReserva']);
});



