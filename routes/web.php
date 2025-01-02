<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'index'])->name('home');

Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
Route::get('/productos/crear', [ProductoController::class, 'create'])->name('productos.create');
Route::post('/productos/crear', [ProductoController::class, 'store'])->name('productos.store');
Route::get('/productos/{producto}/editar', [ProductoController::class, 'edit'])->name('productos.edit');
Route::put('/productos/{producto}/editar', [ProductoController::class, 'update'])->name('productos.update');
Route::get('/productos/{producto}', [ProductoController::class, 'show'])->name('productos.show');
Route::delete('/productos/{producto}', [ProductoController::class, 'destroy'])->name('productos.destroy');
Route::put('/productos/{producto}', [ProductoController::class, 'activate'])->name('productos.activate');


Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');
Route::get('/categorias/{categoria}', [CategoriaController::class, 'show'])->name('categorias.show');

Route::get('/clientes', [ClienteController::class, 'index'])->name('cliente.index');
Route::get('/clientes/{cliente}', [ClienteController::class, 'show'])->name('cliente.show');
Route::delete('/clientes/{cliente}', [ClienteController::class, 'destroy'])->name('cliente.destroy');
Route::put('/clientes/{cliente}', [ClienteController::class, 'activate'])->name('cliente.activate');
