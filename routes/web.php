<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\InicioController;
use APp\Http\Controllers\UsuariosController;
use App\Http\Controllers\ClientesController;

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
    return view('modulos.ingresar');
});

Auth::routes();

Route::get('inicio', [InicioController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/MiPerfil', [App\Http\Controllers\UsuariosController::class, 'MiPerfil'])->name('MiPerfil');
Route::put('/MiPerfil', [App\Http\Controllers\UsuariosController::class, 'MiPerfilUpdate'])->name('MiPerfilUpdate');
Route::get('/Usuarios', [App\Http\Controllers\UsuariosController::class, 'index'])->name('index');
Route::post('/Usuarios', [App\Http\Controllers\UsuariosController::class, 'store'])->name('store');
Route::get('Eliminar-Usuario/{id}', [App\Http\Controllers\UsuariosController::class, 'destroy']);
Route::get('Editar-Usuario/{id}', [App\Http\Controllers\UsuariosController::class, 'edit']);
Route::get('actualizar-Usuario/{id}', [App\Http\Controllers\UsuariosController::class,'update']);
Route::get('/Clientes', [ClientesController::class, 'index']);
Route::post('/Clientes', [ClientesController::class, 'store']);
Route::get('Editar-Cliente/{id}', [ClientesController::class, 'edit']);
Route::put('actualizar-Cliente/{id}', [ClientesController::class,'update']);
Route::get('Eliminar-Cliente/{id}', [ClientesController::class, 'destroy']);