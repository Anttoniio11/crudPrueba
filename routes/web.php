<?php

use App\Http\Controllers\PruebaController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;


//Registro y login

Route::view('/login', "login")->name('login');
Route::view('/registro', "register")->name('registro');
Route::view('/privada', "secret")->middleware('auth')->name('privada');

//peticiones
//validar Registro
Route::post('/validarRegistro', [LoginController::class, 'register'])->name('validarRegistro');

//Inicio de sesion
Route::post('/iniciarSesion', [LoginController::class, 'login'])->name('iniciarSesion');

//Cierre de sesion
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');



//tabla
Route::get('/', [PruebaController::class, "index"])->name('prueba.index');

//Ruta de añadirDato
Route::post('/añadir', [PruebaController::class, "create"])->name('prueba.create');

//Ruta para modificarDato
Route::post('/modificar', [PruebaController::class, "update"])->name('prueba.update');

//Ruta para eliminarDato
Route::get('/eliminar-{id}', [PruebaController::class, "delete"])->name('prueba.delete');


