<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/reservas','App\Http\Controllers\ReservasController@index');

Route::post('/reservas','App\Http\Controllers\ReservasController@store');

Route::put('/reservas','App\Http\Controllers\ReservasController@update');

Route::delete('/reservas/{id}','App\Http\Controllers\ReservasController@destroy');

Route::get('/habitaciones','App\Http\Controllers\HabitacionesController@index');

Route::post('/reservas/buscarPorNombre','App\Http\Controllers\ReservasController@buscarPorNombre');
