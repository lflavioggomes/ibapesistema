@extends('adminlte::page')
@section('content_header')
@section('plugins.Datatables', true)
<h1>Análise Curricular no âmbito da Certificação</h1>
@stop
@section('content')

<div class="row">
    <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('analise')}}">Análise Curricular</a></li>
            <li class="breadcrumb-item">Cadastro</li>
        </ol>
    </div>
</div>

<div class="row">  
    <div class="col-md-7">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Análise Curricular no âmbito da Certificação</h3>
            </div>

            <div class="col-md-12 pontoformacao" style="display:none;">
            <div class="col-md-6 float-sm-right">
                <a class="btn btn-app bg-success mt-3 float-sm-right">
                    <i class="fas" id="ponto">0</i> Pontos
                </a>
            </div>
            </div>

            <form method="POST" action="{{route('site.analise.form')}}" enctype="multipart/form-data">
            @csrf
                <div class="card-body">
                    <p>Limitado a 30 pontos</p>
                    
                    <div class="form-group">
                        <label for="graduacao">Titulo</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" value="" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="graduacao">Limitado</label>
                        <input type="text" class="form-control" id="limitado" name="limitado" value="" required>
                    </div>

                    <div class="form-group">
                        <label for="graduacao">Pontos</label>
                        <input type="text" class="form-control numero" id="previapontoanalise" name="previaponto" value="" required>
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

<div class="modal fade bd-example-modal-lg" id="modalalert" tabindex="-1" role="dialog" aria-labelledby="modalalertLabel">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">    <i class="fas fa-bullhorn"></i> Atenção</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="col-sm-12">
                    <p id="alert"></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
@stop