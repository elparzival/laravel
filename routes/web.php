<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AudienciaController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});


//VISTAS
Route::get('/home', function() { return view('home');})->middleware('status'); 
Route::get('monitorio', [AudienciaController::class, 'index'])->middleware('status'); 


//AUDIENCIAS
Route::get('/audiencia', [AudienciaController::class, 'all'])->name('datos.obtenertodos'); //OBTENER TODOS LOS DATOS
Route::post("/audiencia", [AudienciaController::class, 'save'])->name('datos.guardar'); //GUARDAR DATO
Route::get('/audiencia/eliminar/{id}', [AudienciaController::class, 'delete'])->name('datos.eliminar'); //ELIMINAR DATO
Route::get('/audiencia/obtener/{id}', [AudienciaController::class, 'get'])->name('datos.obtener'); //OBTENER DATO POR ID

//LOGIN
Route::post('/login', [LoginController::class, 'validar'])->name('auth.login'); //Validar credendiales / ingresar
Route::get('/login', [LoginController::class, 'salir'])->name('auth.logout'); //Finalizar sesión

