@extends('adminlte::page')
@section('content_header')
<h1>Solicitação para necessidades especiais durante a prova</h1>
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
    <div class="col-lg-6">
        <div class="alert bg-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-exclamation-triangle"></i> Atenção!</h5>
            Solicitação Reprovada
        </div>
    </div>
</div>
@php
endif;
@endphp
<div class="row">
    <div class="col-lg-6">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h5 class="m-0">Prezados,</h5>
            </div>
            <div class="card-body">
                <h6 class="card-title"></h6>
                <p class="card-text">Eu <strong>{{$nome}},</strong> </p>
                <p class="card-text">{{$dados->formacao}}, Registro no órgão de classe {{$dados->crea}}, residente em {{$dados->cidade.' - '.$dados->estado}}.</p>
                <p class="card-text">Vem na oportunidade solicitar acomodação de necessidades especiais no local do exame.</p>
                <form method="POST" action="{{route('site.solicitacao.form')}}" id="enviasolicitacao">
                @csrf
                <input type="hidden" name="aceita" value="" id="solicitacao">
                <div class="form-group" style="display:none;" id="necessidade">
                    <label>Qual é a sua necessidade?</label>
                        <textarea class="form-control col-lg-6" rows="3" cols="1" placeholder="" name="solicitacao" id="campo"></textarea>
                    </div>
                    <button type="button" class="btn btn-danger" id="naoaplica">Não se aplica</button>
                    <button type="button" class="btn btn-success" id="solicitar">Solicitar</button><br><br>
                    <button type="button" class="btn btn-primary" id="enviar" style="display:none;">Enviar</button>
                </form>
            </div>
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
    <div class="col-lg-6">
        <div class="alert bg-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-info"></i> Atenção!</h5>
            Solicitação Aprovada
        </div>
    </div>
</div>

@php
endif;
@endphp

@if( $status == 3 )
<div class="row">
    <div class="col-lg-6">
        <div class="alert bg-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-info"></i> Atenção!</h5>
            Solicitação Em Análise
        </div>
    </div>
</div>
@endif
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
    <div class="col-lg-6">
        <div class="alert bg-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Atenção!</h5>
            Por favor complete os seguintes dados para continuar com a solicitação <br>
           <a href="dados" style="text-decoration:none;"> - Dados Pessoais </a>
        </div>
    </div>
</div>

@php
    endif; 
@endphp
@include('layouts.footer')
@stop