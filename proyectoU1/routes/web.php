<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\LogoutController;
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

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/login',[LoginController::class,'index'])->name('login');
//Ruta de validación de login
Route::post('/login',[LoginController::class,'store']);
//Ruta hacia la función del controlador y se le asocia un nombre de ruta
Route::get('/crear',[RegisterController::class,'index'])->name('register');
//Ruta para enviar datos al servidor
Route::post('/crear',[RegisterController::class,'store']);

//Ruta para mostrar el dashboard del usuario autenticado
Route::get('/muro',[PostController::class,'index'])->name('post.index');

//Ruta para mostrar la tabla de productos
Route::get('/productos',[ProductosController::class,'index'])->name('productos');
//Ruta para añadir nuevo producto
Route::get('/newproduct',[ProductosController::class,'newProduct'])->name('newproduct');
Route::post('/newproduct',[ProductosController::class,'store']);
//Ruta para eliminar productos
Route::post('/deleteproduct',[ProductosController::class,'delete'])->name('delete');

//Ruta para cerrar sesión
Route::post('/logout',[LogoutController::class,'store'])->name('logout');
