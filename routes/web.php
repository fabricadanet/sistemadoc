<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    DependenteController,
    CadastroController,
    UserController,
    ProfileController,
    HomeController,
    AutorizacaoController,
    ListaController,
    PdfController
};


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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::post('users/search', [UserController::class, 'search'])->name('users.search');


    Route::resource('cadastros/associado', CadastroController::class);
    Route::get('cadastros/admin/create', [CadastroController::class, 'createAdmin'])->name('cadastros.admin.create');
    Route::post('cadastros/admin/store', [CadastroController::class, 'storeAdmin'])->name('cadastros.admin.store');
    Route::get('cadastros/associado/{id}/ver', [CadastroController::class, 'showAssociado'])->name('cadastros.associado.ver');
     Route::get('cadastros/associado/{id}/destroy', [CadastroController::class, 'destroyAssociado'])->name('cadastros.associado.destroy');
    Route::resource('cadastros/dependente', DependenteController::class);
    Route::get('documentos/associado/download/{id}', [DocumentosController::class, 'index'])->name('documentos.associado.index');
    Route::get('cadastros/dependentes/associado/{id}', [DependenteController::class, 'show'])->name('dependentes.associado.show');
    Route::get('autorizacoes/capaodacanoa', [AutorizacaoController::class, 'contribuicaoCC'])->name('autorizacoes.capao.form');
    Route::post('autorizacoes/capaodacanoa', [AutorizacaoController::class, 'storeCC'])->name('autorizacoes.capao.store');
    Route::get('autorizacoes/xangrila', [AutorizacaoController::class, 'contribuicaoXla'])->name('autorizacoes.xangrila.form');
    Route::post('autorizacoes/xangrila', [AutorizacaoController::class, 'storeXla'])->name('autorizacoes.xangrila.store');
    Route::get('lista/geral',[ListaController::class,'index'])->name('lista.geral');
    Route::get('lista/capao', [ListaController::class,'listaCapao'])->name('lista.capao');
    Route::get('lista/xangrila', [ListaController::class,'listaXangrila'])->name('lista.xangrila');
    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('pdf', [PdfController::class,'pdf'])->name('associado.pdf');
});