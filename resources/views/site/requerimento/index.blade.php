@extends('adminlte::page')
@section('content_header')
<h1>Referente: Certificação em Engenharia de Avaliações</h1>
@stop

@section('content')
@php
if( $requerimento == '' ):
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
                <p class="card-text">{{$result->formacao}} CREA/CAU {{$result->crea}}</p>
                <p class="card-text">residente {{$result->cidade.' - '.$result->estado}}, </p>
                <p class="card-text">vem na oportunidade requerer a V.Sa  </p>
                <p class="card-text">a outorga do Certificado em Engenharia de Avaliações, </p>
                <p class="card-text">conforme o Regulamento do IBAPE.</p>
                <form method="POST" action="{{route('site.requerimento.form')}}">
                @csrf
                <input type="hidden" name="solicitacao" value="1">
                    <button type="submit" class="btn btn-primary">Solicitar</button>
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