<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\Forma_pagController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FabricanteController;
use App\Http\Controllers\TipoController;


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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [ProdutoController::class, 'listar']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    

Route::get('/produto/novo', [ProdutoController::class, 'novo']);

Route::post('/produto/salvar', [ProdutoController::class, 'salvar']);

Route::get('/produto/editar/{id}', [ProdutoController::class, 'editar']);

Route::get('/produto/excluir/{ID}', [ProdutoController::class, 'excluir']);



Route::get('/forma_pag/listar', [Forma_pagController::class, 'listar']);

Route::get('/forma_pag/novo', [Forma_pagController::class, 'novo']);

Route::post('/forma_pag/salvar', [Forma_pagController::class, 'salvar']);

Route::get('/forma_pag/editar/{id}', [Forma_pagController::class, 'editar']);

Route::get('/forma_pag/excluir/{ID}', [Forma_pagController::class, 'excluir']);

Route::get('/cliente/listar', [ClienteController::class, 'listar']);



Route::get('/cliente/editar/{id}', [ClienteController::class, 'editar']);

Route::get('/cliente/excluir/{ID}', [ClienteController::class, 'excluir']);

Route::get('/fabricante/listar', [FabricanteController::class, 'listar']);

Route::get('/fabricante/novo', [FabricanteController::class, 'novo']);

Route::post('/fabricante/salvar', [FabricanteController::class, 'salvar']);

Route::get('/fabricante/editar/{id}', [FabricanteController::class, 'editar']);

Route::get('/fabricante/excluir/{ID}', [FabricanteController::class, 'excluir']);

Route::get('/tipo/listar', [TipoController::class, 'listar']);

Route::get('/tipo/novo', [TipoController::class, 'novo']);

Route::post('/tipo/salvar', [TipoController::class, 'salvar']);

Route::get('/tipo/editar/{id}', [TipoController::class, 'editar']);

Route::get('/tipo/excluir/{ID}', [TipoController::class, 'excluir']);

Route::get('/compra/editar/{id}', [CompraController::class, 'editar']);

Route::get('/compra/excluir/{ID}', [CompraController::class, 'excluir']);

});

Route::get('/compra/listar', [CompraController::class, 'listar']);

Route::get('/compra/novo', [CompraController::class, 'novo']);

Route::post('/compra/salvar', [CompraController::class, 'salvar']);

Route::get('/cliente/novo', [ClienteController::class, 'novo']);

Route::post('/cliente/salvar', [ClienteController::class, 'salvar']);

Route::get('/produto/listar', [ProdutoController::class, 'listar']);
Route::get('/produto/listar', [ProdutoController::class, 'listar'])->name('produto.listar');

require __DIR__.'/auth.php';
