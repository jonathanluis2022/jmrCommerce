<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\siteController;
use App\Http\Controllers\carrinhoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;

//Route::resource('produtos', ProdutoController::class);
//Route::resource('users', UserController::class);

Route::get('/', [SiteController::class, 'index'])->name('site.index');
Route::get('/produto/{slug}', [SiteController::class, 'details'])->name('site.details');
Route::get('/categoria/{id}', [SiteController::class, 'categoria'])->name('site.categoria');

Route::get('/carrinho', [carrinhoController::class, 'carrinhoLista'])->name('site.carrinho');
Route::post('/carrinho', [carrinhoController::class, 'adicionaCarrinho'])->name('site.addCarrinho');
Route::post('/remover', [carrinhoController::class, 'removeCarrinho'])->name('site.removecarrinho');
Route::post('/atualizar}', [carrinhoController::class, 'atualizacarrinho'])->name('site.atualizacarrinho');
Route::get('/limpar}', [carrinhoController::class, 'limparCarrinho'])->name('site.limparcarrinho');

Route::view('/login', 'login.form')->name('login.form');
Route::post('/auth', [LoginController::class, 'auth'])->name('login.auth');
Route::get('logout', [LoginController::class, 'logout'])->name('login.logout');
Route::get('register', [LoginController::class, 'create'])->name('login.create');

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard')->middleware(['auth', 'checkemail']);
Route::get('admin/produtos',[ProdutoController::class, 'index'])->name('admin.produtos');
Route::delete('/admin/produto/delete/{id}', [ProdutoController::class, 'destroy'])->name('admin.produto.delete');
Route::post('admin/produto/store', [ProdutoController::class, 'store'])->name('admin.produto.store');