<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');


    Route::resource('cadastros/associado', \App\Http\Controllers\CadastroController::class);
    Route::resource('cadastros/dependente', \App\Http\Controllers\DependenteController::class);
    Route::get('autorizacoes/capaodacanoa', [\App\Http\Controllers\AutorizacaoController::class, 'contribuicaoCC'])->name('autorizacoes.capao.form');
    Route::post('autorizacoes/capaodacanoa', [\App\Http\Controllers\AutorizacaoController::class, 'storeCC'])->name('autorizacoes.capao.store');
    Route::get('autorizacoes/xangrila', [\App\Http\Controllers\AutorizacaoController::class, 'contribuicaoXla'])->name('autorizacoes.xangrila.form');
    Route::post('autorizacoes/xangrila', [\App\Http\Controllers\AutorizacaoController::class, 'storeXla'])->name('autorizacoes.xangrila.store');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});