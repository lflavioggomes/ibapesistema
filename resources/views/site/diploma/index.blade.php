@extends('adminlte::page')
@section('content_header')
<h1>Diploma de Graduação</h1>
@stop

@section('content')
@php
if( !empty($dados) ): 
@endphp

@php
if( empty($result) || $status == 2): 
@endphp

@php
if( $status == 2 ):
@endphp
<div class="row">
    <div class="col-lg-12">
        <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-exclamation-triangle"></i> Atenção!</h5>
            Diploma Reprovado
        </div>
    </div>
</div>
@php
endif;
@endphp     
<div class="row">  
    <div class="col-md-6">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Envio de Diploma</h3>
            </div>


            <form method="POST" action="{{route('site.diploma.form')}}" enctype="multipart/form-data">
            @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="graduacao">Graduação</label>
                        <input type="text" class="form-control" id="graduacao" name="graduacao" value="{{$dados->formacao}}" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="diploma">Diploma - <small>Adicionar Frente e Verso</small></label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="form-control" id="diploma" name="diploma" required>
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

@php
    else: 
@endphp

<!-- Mensagem que foi solicitado con seus status-->
@php
if( $status == 1 ):
@endphp

<div class="row">
    <div class="col-lg-12">
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-info"></i> Atenção!</h5>
            Diploma Aprovado
        </div>
    </div>
</div>

@php
endif;
@endphp

@php
if( $status == 3 ):
@endphp
<div class="row">
    <div class="col-lg-12">
        <div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-info"></i> Atenção!</h5>
            Diploma Em Análise
        </div>
    </div>
</div>
@php
endif;
@endphp
<!-- Fim da Mensagem de solicitação -->

<!-- Fim se existe registro no requerimento -->
@php
endif;
@endphp

@php
    else:
@endphp
<!-- Mensagem que dados pessoais não preenchidos -->
<div class="row">
    <div class="col-lg-12">
        <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Atenção!</h5>
            Por favor complete os seguintes dados para continuar com a solicitação <br>
           <a href="/dados" style="text-decoration:none;"> - Dados Pessoais </a>
        </div>
    </div>
</div>

@php
    endif; 
@endphp

@stop
@section('css')
<!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
@stop

@section('js')
<script>
    console.log('Hi!');
</script>
@stop