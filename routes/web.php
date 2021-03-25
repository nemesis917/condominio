<?php

use App\Http\Controllers\webController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\empresaController;
use App\Http\Controllers\edificioController;
use App\Http\Controllers\viviendaController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('web/index');
// });
Route::get('/', [webController::class, "index"])->name('web.index');
Route::get('/nosotros', [webController::class, "nosotros"])->name('web.nosotros');
Route::get('/servicios', [webController::class, "servicios"])->name('web.servicios');



require __DIR__.'/auth.php';
Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/dashboard', [homeController::class, "index"])->name('dashboard');
});

Route::group(['prefix' => 'sistema/empresa','middleware' => ['auth']], function () {
    Route::get('/general', [empresaController::class, "index"])->name('empresa.index');
    Route::post('/cargarEmpresa', [empresaController::class, "store"])->name('empresa.guardar');
    Route::get('/consultar-datos-empresa', [empresaController::class, "consultar"])->name('empresa.consultar');
    Route::get('/ajax/consultarEmpresa', [empresaController::class, "jq_consultarEmpresa"]);
    Route::post('/ajax/consultarUnaEmpresa', [empresaController::class, "jq_consult"]);
    Route::post('/modificarEmpresa', [empresaController::class, "modify"])->name('empresa.modificar');
    Route::post('/ajax/eliminarUnaEmpresa', [empresaController::class, "destroy"]);
});

Route::group(['prefix' => 'sistema/edificio','middleware' => ['auth']], function () {
    Route::get('/', [edificioController::class, "index"])->name('edificio.index');
    Route::get('/ajax/consulta', [edificioController::class, "jq_consulta"]);
    Route::post('/guardar-edificio', [edificioController::class, "store"])->name('edificio.guardar');
    Route::post('ajax/modificarUnaEmpresa', [edificioController::class, "jq_modificarUnaEmpresa"]);
    Route::post('modificarDatosEmpresa', [edificioController::class, "update"])->name('edificio.modificar');
    Route::post('ajax/eliminarUnEdificio', [edificioController::class, "destroy"]);
});

Route::group(['prefix' => 'sistema/viviendas','middleware' => ['auth']], function () {
    Route::get('/', [viviendaController::class, "index"])->name('vivienda.index');
    Route::get('/ajax/consulta/', [viviendaController::class, "consultarVivienda"]);
    Route::get('/ajax/verEmpresa/{id}', [viviendaController::class, "jq_seleccionarEmpresa"]);
    Route::get('/ajax/consultas/{id}', [viviendaController::class, "jq_consultarVivienda"]);

    //Route::get()->name();


});