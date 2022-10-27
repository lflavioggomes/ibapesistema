@extends('adminlte::page')
@section('content_header')
@section('plugins.Datatables', true)
<h1>Tempo de Atuação Profissional no Âmbito da Certificação</h1>
@stop
@section('content')

<div class="row">
    <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('atuacao')}}">Tempo de Atuação Profissional</a></li>
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
                    <p><strong>Deverá ser informado o n° de anos de experiência na atividade no âmbito da Certificação</strong></p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="col-md-12 pontoformacao" style="display:none;">
            <div class="col-md-6 float-sm-right">
                <a class="btn btn-app bg-success mt-3 float-sm-right">
                    <i class="fas" id="ponto">0</i> Pontos
                </a>
            </div>
            </div>

            <form method="POST" action="{{route('site.atuacao.form')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="previaponto" id="previaponto" value="">
                <div class="card-body">
                    <p>Deverá ser informado o n° de anos de experiência na atividade no âmbito da Certificação</p>

                    <div class="form-group">
                        <label for="graduacao">N° de anos de atuação</label>
                        <input type="text" class="form-control numero" id="numero_ano" name="numero_ano" value="" required>
                    </div>
                    
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="numero_hora" name="numero_hora" value="1920" readonly>
                    </div>
                    
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="total_hora" name="total_hora" value="" readonly>
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