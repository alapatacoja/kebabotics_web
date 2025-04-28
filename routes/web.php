<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ReviewController;
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

//home
Route::get('/', [HomeController::class, 'index'])->name('home');

//idioma
Route::get('lang/{lang}', [HomeController::class, 'changelang'])->name('changelang');

//página de pedir
Route::get('/pedido', [PedidoController::class, 'index'])->name('pedido.index');

//añadir kebab al carrito
Route::post('/pedido/add', [PedidoController::class, 'add'])->name('pedido.add');

//modificar kebab
Route::get('/pedido/edit/{kebab}', [PedidoController::class, 'edit'])->name('pedido.edit');

Route::post('/pedido/update', [PedidoController::class, 'update'])->name('pedido.update');

//mostrar el carrito
Route::get('/carrito', [PedidoController::class, 'carrito'])->name('pedido.carrito');

//eliminar kebab
Route::get('/carrito/delete/{kebab}', [PedidoController::class, 'delete'])->name('pedido.delete');

//guardar pedido
Route::post('/carrito/store', [PedidoController::class, 'store'])->name('pedido.store');

//pedido aceptado
Route::get('/factura/{pedido}', [PedidoController::class, 'mostrarFactura'])->name('factura.mostrar');

//descargar factura
Route::get('/factura/{id}/descargar', [PedidoController::class, 'descargarFactura'])->name('factura.descargar');

//dejar reviews
Route::get('/reviews/{id}', [ReviewController::class, 'create'])->name('review.create');

//guardar reviews
Route::post('reviews/store', [ReviewController::class, 'store'])->name('review.store');

//instrucciones
Route::get('/instrucciones', [HomeController::class, 'instrucciones'])->name('instrucciones');

//sobre nosotros
Route::get('/kebabotics', [HomeController::class, 'sobrenosotros'])->name('sobrenosotros');

