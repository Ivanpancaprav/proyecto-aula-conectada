<?php

use App\Http\Controllers\CicloController;
use App\Http\Controllers\PerfilesMonitorController;
use Illuminate\Support\Facades\Route;

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

//RUTAS CICLOS
Route::resource('ciclos',CicloController::class);

//RUTAS PERFILES_MONITOR
Route::resource('perfiles-monitor',PerfilesMonitorController::class);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

