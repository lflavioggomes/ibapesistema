<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


//Auth::routes(['register' => false]);

Auth::routes();

Route::namespace('Site')->group(function () {
    Route::get('/', 'HomeController@index')->name('site.home');

    Route::get('dados', 'DadosController@index')->name('site.dados');
    Route::post('dados', 'DadosController@form')->name('site.dados.form');
    Route::get('buscacep', 'DadosController@buscacep')->name('site.dados.buscacep');

    Route::get('requerimento', 'RequerimentoController@index')->name('site.requerimento');
    Route::post('requerimento', 'RequerimentoController@form')->name('site.requerimento.form');

    Route::get('diploma', 'DiplomaController@index')->name('site.diploma');
    Route::post('diploma', 'DiplomaController@form')->name('site.diploma.form');

    Route::get('atestado', 'AtestadoController@index')->name('site.atestado');
    Route::post('atestado', 'AtestadoController@form')->name('site.atestado.form');

    Route::get('solicitacao', 'SolicitacaoController@index')->name('site.solicitacao');
    Route::post('solicitacao', 'SolicitacaoController@form')->name('site.solicitacao.form');

    Route::get('comprovante', 'ComprovanteController@index')->name('site.comprovante');
    Route::post('comprovante', 'ComprovanteController@form')->name('site.comprovante.form');

    Route::get('verifica', 'VerificaController@index')->name('site.comprovante');
    Route::post('verifica', 'VerificaController@confirma')->name('site.verifica.confirma');

    Route::get('formacao', 'FormacaoController@index')->name('site.formacao');
    Route::get('formacao/cadastro', 'FormacaoController@cadastro')->name('site.formacao.cadastro');
    Route::post('formacao', 'FormacaoController@form')->name('site.formacao.form');
    Route::get('formacao/ponto', 'FormacaoController@ponto')->name('site.formacao');

    Route::get('divulgacao', 'DivulgacaoController@index')->name('site.divulgacao');
    Route::get('divulgacao/cadastro', 'DivulgacaoController@cadastro')->name('site.divulgacao.cadastro');
    Route::post('divulgacao', 'DivulgacaoController@form')->name('site.divulgacao.form');
    Route::get('divulgacao/ponto', 'DivulgacaoController@ponto')->name('site.divulgacao');

    Route::get('trabalho', 'TrabalhoController@index')->name('site.trabalho');
    Route::get('trabalho/cadastro', 'TrabalhoController@cadastro')->name('site.trabalho.cadastro');
    Route::post('trabalho', 'TrabalhoController@form')->name('site.trabalho.form');
    Route::get('trabalho/ponto', 'TrabalhoController@ponto')->name('site.trabalho');

    Route::get('premiado', 'PremiadoController@index')->name('site.premiado');
    Route::get('premiado/cadastro', 'PremiadoController@cadastro')->name('site.premiado.cadastro');
    Route::post('premiado', 'PremiadoController@form')->name('site.premiado.form');
    Route::get('premiado/ponto', 'PremiadoController@ponto')->name('site.premiado');

    Route::get('docencia', 'DocenciaController@index')->name('site.docencia');
    Route::get('docencia/cadastro', 'DocenciaController@cadastro')->name('site.docencia.cadastro');
    Route::post('docencia', 'DocenciaController@form')->name('site.docencia.form');
    Route::get('docencia/ponto', 'DocenciaController@ponto')->name('site.docencia');

    Route::get('atuacao', 'AtuacaoController@index')->name('site.atuacao');
    Route::get('atuacao/cadastro', 'AtuacaoController@cadastro')->name('site.atuacao.cadastro');
    Route::post('atuacao', 'AtuacaoController@form')->name('site.atuacao.form');
    Route::get('atuacao/ponto', 'AtuacaoController@ponto')->name('site.atuacao');

    Route::get('analise', 'AnaliseController@index')->name('site.analise');
    Route::get('analise/cadastro', 'AnaliseController@cadastro')->name('site.analise.cadastro');
    Route::post('analise', 'AnaliseController@form')->name('site.analise.form');
    Route::get('analise/ponto', 'AnaliseController@ponto')->name('site.analise');

    Route::get('exercicio', 'ExercicioController@index')->name('site.exercicio');
    Route::get('exercicio/cadastro', 'ExercicioController@cadastro')->name('site.exercicio.cadastro');
    Route::post('exercicio', 'ExercicioController@form')->name('site.exercicio.form');
    Route::get('exercicio/ponto', 'ExercicioController@ponto')->name('site.exercicio');

    Route::get('participacao', 'ParticipacaoController@index')->name('site.participacao');
    Route::get('participacao/cadastro', 'ParticipacaoController@cadastro')->name('site.participacao.cadastro');
    Route::post('participacao', 'ParticipacaoController@form')->name('site.participacao.form');
    Route::get('participacao/ponto', 'ParticipacaoController@ponto')->name('site.participacao');
  
});

Route::namespace('Admin')->group(function () {

    Route::get('candidato', 'CandidatoController@index')->name('admin.candidato');
    Route::get('candidato/list', 'CandidatoController@list')->name('admin.candidato.list');
    Route::get('candidato/dado', 'CandidatoController@dado')->name('admin.candidato.dado');
    Route::get('candidato/requerimento', 'CandidatoController@requerimento')->name('admin.candidato.requerimento');
    Route::get('candidato/atestado', 'CandidatoController@atestado')->name('admin.candidato.atestado');
    Route::get('candidato/diploma', 'CandidatoController@diploma')->name('admin.candidato.diploma');
    Route::get('candidato/solicitacao', 'CandidatoController@solicitacao')->name('admin.candidato.solicitacao');
    Route::get('candidato/comprovante', 'CandidatoController@comprovante')->name('admin.candidato.comprovante');

    Route::post('statusdado', 'CandidatoController@statusdado')->name('admin.candidato.statusdado');

    Route::get('prequalificacao', 'CandidatoController@prequalificacao')->name('site.verifica.prequalificacao');

    Route::get('julgador', 'JulgadorController@index')->name('admin.julgador');
    Route::get('julgador/cadastro', 'JulgadorController@cadastro')->name('admin.julgador.cadastro');
    Route::get('julgador/{julgador}', 'JulgadorController@edit')->name('admin.julgador.edit');
    Route::post('julgador/form', 'JulgadorController@form')->name('admin.julgador.form');
    Route::post('julgador/formedit', 'JulgadorController@formedit')->name('admin.julgador.formedit');

    Route::get('perfil', 'PerfilController@index')->name('admin.perfil');
    
});

Route::namespace('Julgador')->group(function () {
    Route::get('listagem', 'ListagemController@index')->name('julgador.listagem');
});



