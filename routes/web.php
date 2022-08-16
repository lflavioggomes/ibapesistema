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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::namespace('Site')->group(function () {
    Route::get('/', 'HomeController@index')->name('site.home');

    Route::get('dados', 'DadosController@index')->name('site.dados');
    Route::post('dados', 'DadosController@form')->name('site.dados.form');

    Route::get('requerimento', 'RequerimentoController@index')->name('site.requerimento');
    Route::post('requerimento', 'RequerimentoController@form')->name('site.requerimento.form');

    Route::get('diploma', 'diplomaController@index')->name('site.diploma');
    Route::post('diploma', 'diplomaController@form')->name('site.diploma.form');

    Route::get('atestado', 'AtestadoController@index')->name('site.atestado');
    Route::post('atestado', 'AtestadoController@form')->name('site.atestado.form');

    Route::get('solicitacao', 'SolicitacaoController@index')->name('site.solicitacao');
    Route::post('solicitacao', 'SolicitacaoController@form')->name('site.solicitacao.form');

    Route::get('comprovante', 'ComprovanteController@index')->name('site.comprovante');
});


