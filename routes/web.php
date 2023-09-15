<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControleCadastro;
use App\Http\Controllers\ControleNetwork;
use App\Http\Controllers\ControleHardware;
use App\Http\Controllers\ControleInfraestrutura;
use App\Http\Controllers\ControleFaq;
use App\Models\inventario;
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

//Rota Login
Route::get('/', function () {
    return view('auth.login');
});

//Rotas Cadastro/servidores

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [ControleCadastro::class, 'showHome'])->name('home');
});
  
Route::get('/comp/list', [ControleCadastro::class, 'compList']);

Route::get('/comp/item/{id}', [ControleCadastro::class, 'listComp']);

Route::get('comp/edit/{id}', [ControleCadastro::class, 'edit']);

Route::post('comp/edit/{id}', [ControleCadastro::class, 'update'])->name('edit_item');

Route::get('/comp/store', function () {
    return view('inventario.comp_store');
});

Route::post('/comp/store', [ControleCadastro::class, 'store']);

Route::post('/comp/search', [ControleCadastro::class, 'search'])->name('comp_search');

// Rotas Redes

Route::get('/netw/store', function () {
    return view('inventario.netw_store');
});

Route::get('/netw/item/{id}', [ControleNetwork::class, 'netwItem']);

Route::get('/netw/list', [ControleNetwork::class, 'show']);

Route::post('/netw/store', [ControleNetwork::class, 'store']);

Route::get('/netw/edit/{id}', [ControleNetwork::class, 'edit']);

Route::post('/netw/edit/{id}', [ControleNetwork::class, 'update'])->name('netw_edit');

Route::post('/netw/search', [ControleNetwork::class, 'search'])->name('netw_search');

//Rotas Hardware

Route::get('/hardw/store', function () {
    return view('inventario.hardw_store');
});
Route::post('/hardw/store', [ControleHardware::class, 'store']);

Route::get('/hardw/list', [ControleHardware::class, 'show']);

Route::get('/hardw/item/{id}', [ControleHardware::class, 'hardwItem']);

Route::get('hardw/edit/{id}', [ControleHardware::class, 'edit']);

Route::post('hardw/edit/{id}', [ControleHardware::class, 'update'])->name('hardw_edit');

Route::post('/hardw/search', [ControleHardware::class, 'search'])->name('hardw_search');

//Rotas Infraestrutura

Route::get('/infra/store', function () {
    return view('inventario.infra_store');
});
Route::post('/infra/store', [ControleInfraestrutura::class, 'store']);

Route::get('/infra/list', [ControleInfraestrutura::class, 'show']);

Route::get('/infra/item/{id}', [ControleInfraestrutura::class, 'infraItem']);

Route::get('infra/edit/{id}', [ControleInfraestrutura::class, 'edit']);

Route::post('infra/edit/{id}', [ControleInfraestrutura::class, 'update'])->name('infra_edit');

Route::post('/infra/search', [ControleInfraestrutura::class, 'search'])->name('infra_search');

Route::delete('/infra/{id}', [ControleInfraestrutura::class, 'destroy']);

//Rotas FAQ

Route::get('/faq/store', function () {
    return view('inventario.faq_store');
});
Route::post('/faq/store', [ControleFaq::class, 'store']);

Route::get('/faq/item/{id}', [ControleFaq::class, 'faqItem']);

Route::get('/faq/list', [ControleFaq::class, 'show']);

Route::post('/faq/search', [ControleFaq::class, 'search'])->name('faq_search');

Route::get('faq/edit/{id}', [ControleFaq::class, 'edit']);

Route::post('faq/edit/{id}', [ControleFaq::class, 'update'])->name('faq_edit');










