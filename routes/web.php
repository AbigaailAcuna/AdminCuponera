<?php

use App\Http\Controllers\EmpresaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\CuponController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\TrabajadorController;

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

Route::get('/', function () {
    return view('welcome');
});


Route::controller(PrincipalController::class)->group(function()
{
    Route::get('/index','index');
    Route::get('/empresa','empresas');
    Route::get('/cupon','cupones');
    Route::get('/categoria','categorias');
    Route::get('/trabajadores','trabajadores');
    
    
    
    
}
);
Route::controller(EmpresaController::class)->group(function()
{
    Route::get('/activas/{id}','active');
    Route::get('/canjeados/{id}','canjeado');
    Route::get('/vencidos/{id}','vencido');
    Route::get('/esperas/{id}','espera');
    Route::get('/descartados/{id}','descartado');
    Route::get('/rechazados/{id}','rechazado');
    
}
);
Route::controller(ClienteController::class)->group(function()
{
    Route::get('/disponible/{id}','active');
    Route::get('/canjeado/{id}','canjeado');
    Route::get('/vencido/{id}','vencido');

}

);

Route::resource('empresa', EmpresaController::class);
Route::resource('cupon', CuponController::class);
Route::resource('categoria', CategoriaController::class);
Route::resource('trabajador', TrabajadorController::class);
Route::resource('cliente', ClienteController::class);
