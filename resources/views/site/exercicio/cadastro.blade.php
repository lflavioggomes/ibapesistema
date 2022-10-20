@extends('adminlte::page')
@section('content_header')
@section('plugins.Datatables', true)
<h1>Exercício Regular da Profissão no âmbito da Certificação - Cadastro</h1>
@stop
@section('content')

<div class="row">
    <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('exercicio')}}">Exercício Regular da Profissão</a></li>
            <li class="breadcrumb-item">Cadastro</li>
        </ol>
    </div>
</div>

<div class="row">  
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Exercício Regular da Profissão no âmbito da Certificação</h3>
            </div>

            <div class="col-md-12 pontoformacao" style="display:none;">
            <div class="col-md-6 float-sm-right">
                <a class="btn btn-app bg-success mt-3 float-sm-right">
                    <i class="fas" id="ponto">0</i> Pontos
                </a>
            </div>
            </div>

            <form method="POST" action="{{route('site.exercicio.form')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="previaponto" id="previaponto" value="">
                <div class="card-body">
                    
                <div class="form-group">
                        <label for="graduacao">Comprovou</label>
                        <select class="form-control" id="nivel" name="comprovou" required>
                                    <option value="">Selecione</option>
                                    <option value="Sim" data-ponto="1">Sim</option>
                                    <option value="Não" data-ponto="0">Não</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="graduacao">N° ART / RRT</label>
                        <input type="text" class="form-control" id="art_rrt" name="art_rrt" value="" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="graduacao">Contratante</label>
                        <input type="text" class="form-control" id="contratante" name="contratante" value="" required>
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