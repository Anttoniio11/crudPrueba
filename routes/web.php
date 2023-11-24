<?php

use App\Http\Controllers\PruebaController;
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

Route::get('/', [PruebaController::class, "index"])->name('prueba.index');

//Ruta de añadir
Route::post('/añadir', [PruebaController::class, "create"])->name('prueba.create');

//Ruta para modificar
Route::post('/modificar', [PruebaController::class, "update"])->name('prueba.update');

//Ruta para eliminar
Route::get('/eliminar-{id}', [PruebaController::class, "delete"])->name('prueba.delete');





// Route::get('/textoPrueba', function () {
//     return "Esto es una prueba";
// });
