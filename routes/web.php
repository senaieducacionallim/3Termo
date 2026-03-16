<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('clientes', ClienteController::class);
});


<<<<<<< HEAD

// Rota para mostrar o formulário
Route::get('/clientes/create', [ClienteController::class, 'create'])->name('clientes.create');

Route::get('/clientes/edit', [ClienteController::class, 'edit'])->name('clientes.edit');

// Rota para RECEBER os dados e salvar (POST)
Route::post('/clientes', [ClienteController::class, 'store'])->name('clientes.store');



Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');
=======
// Rotas para estrutura de clientes para cadastro , edição e exclusão
// Rota para mostrar o formulário
Route::get('/clientes/create', [ClienteController::class, 'create'])->name('clientes.create');
// Rota para editar os dados
Route::get('/clientes/edit', [ClienteController::class, 'edit'])->name('clientes.edit');
Route::get('/clientes/update', [ClienteController::class, 'update'])->name('clientes.update');
// Rota para RECEBER os dados e salvar (POST)
Route::post('/clientes', [ClienteController::class, 'store'])->name('clientes.store');

// Rotas Gerais
Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');
Route::get('/pedido', [ClienteController::class, 'index'])->name('pedidos.index');
Route::get('/fornecedor', [ClienteController::class, 'index'])->name('fornecedores.index');
Route::get('/estoque', [ClienteController::class, 'index'])->name('estoque.index');
Route::get('/produto', [ClienteController::class, 'index'])->name('produtos.index');
>>>>>>> 0198567210f7e40252ce38cc9dce97471a0d004c

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
