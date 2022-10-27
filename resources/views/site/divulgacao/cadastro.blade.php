@extends('adminlte::page')
@section('content_header')
@section('plugins.Datatables', true)
<h1>Divulgação de Material Técnico - Cadastro</h1>
@stop
@section('content')

<div class="row">
    <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('divulgacao')}}">Divulgação de Material Técnico</a></li>
            <li class="breadcrumb-item">Cadastro</li>
        </ol>
    </div>
</div>

<div class="row">  
    <div class="col-sm-12 col-md-12">
        <div class="card card-default col-md-6">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-bullhorn"></i>
                    Atenção
                </h3>
            </div>
    
            <div class="card-body">
                <div class="callout callout-danger">
                    <p><strong> Ordenar o preenchimento, do tiutlo mais recente para o mais antigo</strong></p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Divulgação de Material Técnico</h3>
            </div>

            <div class="col-md-12 pontoformacao" style="display:none;">
            <div class="col-md-6 float-sm-right">
                <a class="btn btn-app bg-success mt-3 float-sm-right">
                    <i class="fas" id="ponto">0</i> Pontos
                </a>
            </div>
            </div>

            <form method="POST" action="{{route('site.divulgacao.form')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="previaponto" id="previaponto" value="">
                <div class="card-body">
                    
                <div class="form-group">
                        <label for="graduacao">Tipo</label>
                        <select class="form-control" id="nivel" name="tipo" required>
                                    <option value="">Selecione</option>
                                    <option value="Livro" data-ponto="10">Livro</option>
                                    <option value="Módulo de Curso" data-ponto="5">Módulo de Curso</option>
                                    <option value="Artigo" data-ponto="1">Artigo</option>
                                    <option value="Outros" data-ponto="1">Outros</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="graduacao">Título</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" value="" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="graduacao">Editora</label>
                        <input type="text" class="form-control" id="editora" name="editora" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="graduacao">Edição</label>
                        <input type="text" class="form-control" id="edicao" name="edicao" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="graduacao">Idioma</label>
                        <input type="text" class="form-control" id="idioma" name="idioma" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="graduacao">Meio Divulgação</label>
                        <select class="form-control" name="meio" required>
                                    <option value="">Selecione</option>
                                    <option value="Impresso">Impresso</option>
                                    <option value="Impresso e mídia">Impresso e mídia</option>
                                    <option value="Meio magnético">Meio magnético</option>
                                    <option value="Meio digital">Meio digital</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="graduacao">Data Publicação</label>
                        <input type="text" class="form-control date" id="ano" name="ano" value="" required>
                    </div>

                    <div class="form-group">
                        <label for="diploma">Arquivo</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="form-control" id="arquivo" name="arquivo" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="confirma" name="confirma" value="1" required>
                        <label class="form-check-label" for="confirma">Confirmo que informações enviadas são verdadeiras</label>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@include('layouts.footer')
@stop