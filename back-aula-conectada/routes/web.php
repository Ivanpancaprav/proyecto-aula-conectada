<?php

use App\Http\Controllers\API\DocumentoController;
use App\Http\Controllers\CicloController;
use App\Http\Controllers\PerfilesMonitorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

//RUTAS CICLOS
Route::resource('ciclos',CicloController::class);

//RUTAS PERFILES_MONITOR
Route::resource('perfiles-monitor',PerfilesMonitorController::class);

// RUTAS - USERS
Route::resource('users', UserController::class)->except(['create', 'index']);
Route::get("/index/{tipo}",[UserController::class, 'index'])->name('users.index');
Route::get("/users/create/{tipo}",[UserController::class, 'create'])->name('users.create');


//RUTAS PRUEBAS FICHEROS
Route::view('/subir','pds')->name('subir');   
//va directamente a la vista, no hace falta poner controlador
Route::post('/subidoFichero',[DocumentoController::class,'create'])->name('subidoFicheroPost');


// LOGIN FUNCIONAL CON RESTRICCION DE ACCESO A USUARIOS ADMINISTRADORES
Route::group(['middleware'=>'auth'],function(){
    
});
