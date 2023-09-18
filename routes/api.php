<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// API CLIENTES
Route::get('/getReservasPub','App\Http\Controllers\ReservasController@getReservasPub');

// API LOGIN
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::get('/habitaciones','App\Http\Controllers\HabitacionesController@index');


// PROTEJIDO ACCIONES
Route::middleware('auth:sanctum')->group(function() {
    Route::get('logout', [AuthController::class, 'logout']);
    Route::get('/reservas','App\Http\Controllers\ReservasController@index');
    Route::get('auth','App\Http\Controllers\ReservasController@auth');
    Route::post('/reservas','App\Http\Controllers\ReservasController@store');
    Route::put('/reservas','App\Http\Controllers\ReservasController@update');
    Route::delete('/reservas/{id}','App\Http\Controllers\ReservasController@destroy');
    Route::post('/reservas/buscarPorNombre','App\Http\Controllers\ReservasController@buscarPorNombre');
    Route::get('/cuentas','App\Http\Controllers\ReservasController@getCuentas');




});