<?php

use App\Http\Controllers\webController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\empresaController;
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

Route::group(['prefix' => 'empresa','middleware' => ['auth']], function () {
    Route::get('/', [empresaController::class, "index"])->name('empresa.index');
    Route::post('/cargarEmpresa', [empresaController::class, "store"])->name('empresa.guardar');
});