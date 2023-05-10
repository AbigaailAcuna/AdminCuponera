<?php

use App\Http\Controllers\EmpresaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\CuponController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\TrabajadorController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\LoginController;
use App\Models\Cuponv;

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
    Route::get('/venta','venta');
    
    
    
    
    
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

Route::controller(VentaController::class)->group(function()
{

    Route::get('/venta/{id}/pdf','pdf');

}

);

Route::controller(CuponController::class)->group(function()
{

    Route::get('/cupon/filtros', 'filtros');

}

);


Route::resource('empresa', EmpresaController::class);
Route::resource('cupon', CuponController::class);
Route::resource('categoria', CategoriaController::class);
Route::resource('trabajador', TrabajadorController::class);
Route::resource('cliente', ClienteController::class);
Route::resource('venta', VentaController::class);

Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/login',[LoginController::class,'check'])->name('login.check');
