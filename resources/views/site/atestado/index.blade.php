@extends('adminlte::page')
@section('content_header')
<h1>Atestado de regularidade nos sistemas CONFEA/CREA ou CAU-BR;</h1>
@stop

@section('content')
@php
if( $atestado == '' ):
    if( $valida > 0 ): 
@endphp
<div class="row">
    <div class="col-lg-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h5 class="m-0">Prezado Presidente,</h5>
            </div>
            <div class="card-body">
                <h6 class="card-title"></h6>
                <p class="card-text">Eu <strong>{{$nome}},</strong> </p>
                <p class="card-text">{{$result->formacao}} CREA/CAU {{$result->crea}}, CPF {{$result->cpf}}</p>
                <p class="card-text">residente {{$result->cidade.' - '.$result->estado}}, </p>
                <p class="card-text">declaro que não existem processos administrativos, judiciais ou disciplinares   </p>
                <p class="card-text">decorrentes do exercício da minha atividade como {{$result->formacao}}, e, </p>
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
<div class="row">
    <div class="col-lg-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h5 class="m-0">Por favor complete seus dados pessoais para continuar com a solicitação <a href="dados">Clique Aqui</a></h5>
            </div>
        </div>
   </div>

</div>
@php
    endif; 
else:    
@endphp
<div class="row">
    <div class="col-lg-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h5 class="m-0">Sua solicitação foi enviada</h5>
            </div>
        </div>
   </div>

</div>

@php
    endif; 
@endphp

@stop
@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!');
</script>
@stop