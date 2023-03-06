<?php

use App\Http\Controllers\API\MonitorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});





//RUTAS MONITORES

Route::post('/crea_monitor',[MonitorController::class,'create']);
Route::delete('/borra_monitor/{id_monitor}',[MonitorController::class,'borra_monitor']);
Route::put('/update_monitor/{id_monitor}', [MonitorController::class, 'update_monitor']);
Route::get('/verMonitor', [MonitorController::class,'verMonitor']); 