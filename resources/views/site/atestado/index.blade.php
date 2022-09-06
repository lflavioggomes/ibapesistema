@extends('adminlte::page')
@section('content_header')
<h1>Declaração de Regularidade</h1>
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
            Declaração de Regularidade Reprovado
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
                <h5 class="m-0">Prezado Presidente,</h5>
            </div>
            <div class="card-body">
                <h6 class="card-title"></h6>
                <p class="card-text">Eu <strong>{{$nome}},</strong> </p>
                <p class="card-text">{{$dados->formacao}} CREA/CAU {{$dados->crea}}, CPF {{$result->cpf}}</p>
                <p class="card-text">residente {{$dados->cidade.' - '.$dados->estado}}, </p>
                <p class="card-text">declaro que não existem processos administrativos, judiciais ou disciplinares   </p>
                <p class="card-text">decorrentes do exercício da minha atividade como {{$dados->formacao}}, e, </p>
                <p class="card-text">em particular, no exercício de funções na área de Engenharia de Avaliações. </p>
                <form method="POST" action="{{route('site.atestado.form')}}">
                @csrf
                <input type="hidden" name="solicitacao" value="1">
                    <button type="submit" class="btn btn-primary">Confirmar</button>
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
            Declaração de Regularidade Aprovada
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
    <div class="col-lg-6">
        <div class="alert bg-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-info"></i> Atenção!</h5>
            Declaração de Regularidade Em Análise
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
