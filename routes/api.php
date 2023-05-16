<?php

use App\Http\Controllers\API\UsuarioController;
use App\Http\Controllers\API\ReservasController;
use App\Http\Controllers\API\SitioController;
use App\Http\Controllers\API\HorarioGuardiaController;
use App\Http\Controllers\API\TarifaController;
use App\Http\Controllers\API\RegistroPagosController;
use App\Http\Controllers\API\ClienteController;
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
Route::get('/usuario/{id}', [UsuarioController::class,'show']);
Route::post('/usuario/', [UsuarioController::class,'store']);
Route::post('/login', [UsuarioController::class, 'login']);

Route::get('/reservas', [ReservasController::class, 'index']);
Route::get('/reservas/{id}', [ReservasController::class, 'show']);
Route::post('/reserva', [ReservasController::class, 'store']);
Route::put('/reserva/{id}', [ReservasController::class, 'update']);

Route::get('/registropagos/deudas', [RegistroPagosController::class, 'deudas']);

Route::put('/sitio/{id}', [SitioController::class, 'update']);
Route::get('/sitio/{id}', [SitioController::class, 'show']);
Route::get('/sitios', [SitioController::class, 'index']);

Route::get('/horario/guardia', [HorarioGuardiaController::class, 'index']);
//Route::get('/horario/guardia/{id}', [HorarioGuardiaController::class, 'show']);
Route::post('/horario/guardia', [HorarioGuardiaController::class, 'store']);
//Route::put('/horario/guardia/{id}', [HorarioGuardiaController::class, 'update']);

Route::post('/tarifa', [TarifaController::class, 'store']);
Route::get('/tarifa', [TarifaController::class, 'last']);
Route::get('/tarifas', [TarifaController::class, 'index']);


Route::get('/cliente/{id}', [ClienteController::class, 'show']);
Route::put('/cliente/{id}', [ClienteController::class, 'update']);
Route::delete('/cliente/{id}', [ClienteController::class, 'destroy']);
