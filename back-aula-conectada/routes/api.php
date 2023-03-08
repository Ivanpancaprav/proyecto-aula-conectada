<?php

use App\Http\Controllers\API\CicloController;
use App\Http\Controllers\API\MonitorController;
use App\Http\Controllers\API\PerfilMonitorController;
use App\Http\Controllers\API\EspacioDidacticoController;
use App\Http\Controllers\API\UserController;
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

Route::post('/crear_monitor',[MonitorController::class,'create']);
Route::delete('/borrar_monitor/{id_monitor}',[MonitorController::class,'borrar_monitor']);
Route::get('/ver_Monitor/{codigo_monitor}', [MonitorController::class,'verMonitor']);

//RUTAS PERFIL_MONITOR

Route::post('/crear_perfil',[PerfilMonitorController::class,'create']);
Route::delete('/borrar_perfil/{id_perfil}',[PerfilMonitorController::class,'borrar_perfil']);
Route::put('/update_perfil', [PerfilMonitorController::class,'update_perfil']);
Route::get('/ver_perfil/{id_perfil}', [PerfilMonitorController::class,'ver_perfil']);

//RUTAS ESPACIO DIDÁCTICO

Route::get('/ver_espacios_por_ciclo/{id_usuario}',[EspacioDidacticoController::class,'ver_espacios_por_ciclo']);
Route::get('/ver_espacio_didactico/{id_espacio}', [EspacioDidacticoController::class,'ver_espacio_didactico']);
Route::post('/crear_espacio_didactico',[EspacioDidacticoController::class,'create']);
<<<<<<< HEAD
Route::delete('/borrar_espacio_didactico/{id_espacio}',[EspacioDidacticoController::class,'borrar_espacio_didactico']);
Route::put('/update_espacio_didactico', [EspacioDidacticoController::class,'update_espacio_didactico']); 
=======
Route::delete('/borrar_espacio_didactico/{id_espacio}',[EspacioDidacticoController::class,'borrar_perfil']);
Route::put('/update_espacio_didactico', [EspacioDidacticoController::class,'update_perfil']);
>>>>>>> 6c48c1d68f7b0f23264e90936a98ea755a639f96


// RUTAS USUARIOS
Route::get('/profesores', [UserController::class, 'indexProfesores']);
Route::get('/alumnos', [UserController::class, 'indexAlumnos']);
Route::get('/user/{id}', [UserController::class, 'show']);
Route::get('/user/{id}/restore', [UserController::class, 'restorePassword']);
Route::put('/user/edit/{id}', [UserController::class, 'editPassword']);


// RUTAS CICLOS
Route::get('/ciclo', [CicloController::class, 'index']);
Route::get('/ciclo/{id}', [CicloController::class, 'show']);
Route::get('/ciclo/{id}/alumnos', [CicloController::class, 'alumnosCiclo']);
Route::get('/ciclo/{id}/profesores', [CicloController::class, 'profesoresCiclo']);

// RUTAS BLOQUES
