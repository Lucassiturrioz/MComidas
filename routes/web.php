<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProductoPedidoController;
use App\Http\Controllers\QuincenaClienteController;
use App\Http\Controllers\QuincenaController;
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
Route::get('/clientes/crear', [ClienteController::class, 'create'])->name('clientes.crear');
Route::post('/clientes/crear', [ClienteController::class, 'store'])->name('clientes.store');
Route::get('/clientes/{cliente}/editar', [ClienteController::class, 'edit'])->name('clientes.edit');
Route::put('/clientes/{cliente}/editar', [ClienteController::class, 'update'])->name('clientes.update');
Route::get('/clientes/{cliente}', [ClienteController::class, 'show'])->name('cliente.show');
Route::delete('/clientes/{cliente}', [ClienteController::class, 'destroy'])->name('cliente.destroy');
Route::put('/clientes/{cliente}', [ClienteController::class, 'activate'])->name('cliente.activate');



Route::get('/pedidos', [PedidoController::class, 'index'])->name('pedidos.index');
Route::get('/pedidos/{pedido}', [PedidoController::class, 'show'])->name('pedidos.show');
Route::get('/clientes/{cliente}/agregar-pedido', [PedidoController::class, 'seleccionarFecha'])->name('pedidos.seleccionarFecha');
Route::get('/clientes/{cliente}/pedido/', [PedidoController::class, 'pedido'])->name('pedidos.porFecha');

Route::post('/clientes/{cliente}/agregar-pedido/{pedido}', [ProductoPedidoController::class, 'store'])->name('pedidos.agregarPedido');
Route::get('/clientes/{cliente}/pedidos/{pedido}', [ProductoPedidoController::class, 'show'])->name('productoPedido.show');
Route::delete('/producto-pedido/{productoPedido}', [ProductoPedidoController::class, 'destroy'])->name('productoPedido.detroy');

Route::get('/quincenas',[QuincenaController::class,'index'])->name('quincena.index');
Route::get('/quincenas/{quincena}',[QuincenaController::class,'show'])->name('quincena.show');


Route::get('/registro-quincena-cliente/{registro}/editar', [QuincenaClienteController::class, 'edit'])->name('registroQuincenaCliente.edit');
Route::put('/registro-quincena-cliente/{registro}', [QuincenaClienteController::class, 'update'])->name('registroQuincenaCliente.update');
Route::get('/registro-quincena-cliente/{registro}', [QuincenaClienteController::class, 'show'])->name('registroQuincenaCliente.show');
