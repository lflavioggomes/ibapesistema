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

Route::namespace('Site')->group(function () {
    Route::get('home', 'HomeController@index')->name('site.home');
    Route::get('dados', 'DadosController@index')->name('site.dados');
    Route::get('requerimento', 'RequerimentoController@index')->name('site.requerimento');
    Route::get('atestado', 'AtestadoController@index')->name('site.atestado');
    Route::get('solicitacao', 'SolicitacaoController@index')->name('site.solicitacao');
    Route::get('comprovante', 'ComprovanteController@index')->name('site.comprovante');
});


