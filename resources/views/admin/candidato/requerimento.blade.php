@extends('adminlte::page')
@section('content_header')
<h1>Dados Pessoais</h1>
@stop
@section('plugins.Datatables', true)
@section('content')
@can('admin')
@php
if( $result->status_id == 2 ):
@endphp
<div class="row">
    <div class="col-lg-6">
        <div class="alert bg-danger info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-exclamation-triangle"></i> Atenção!</h5>
            Requerimento Reprovado
        </div>
    </div>
</div>
@php
endif;
@endphp

@php
if( $result->status_id == 1 ):
@endphp
<div class="row">
    <div class="col-lg-6">
        <div class="alert bg-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Atenção!</h5>
            Requerimento Aprovado
        </div>
    </div>
</div>
@php
endif;
@endphp

@php
if( $result->status_id == 3 ):
@endphp
<div class="row">
    <div class="col-lg-6">
        <div class="alert bg-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-info"></i> Atenção!</h5>
            Requerimento está Em Análise
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
                <p class="card-text">{{$dados->formacao}} CREA/CAU {{$dados->crea}}</p>
                <p class="card-text">residente {{$dados->cidade.' - '.$dados->estado}}, </p>
                <p class="card-text">vem na oportunidade requerer ao Instituto Brasileiro de Engenharia de Avaliações e Perícias.  </p>
                <p class="card-text">a outorga do Certificado em Engenharia de Avaliações, </p>
                <p class="card-text">conforme o Regulamento do IBAPE.</p>
                <form method="post" action="{{route('admin.candidato.statusdado')}}" id="formdadosadmin">
                @csrf
                    <input type="hidden" name="id" id="id_dado" value="{{$result->id}}">
                    <input type="hidden" name="status_id" id="status_id_admin" value="">
                    <input type="hidden" name="tabela" id="tabela" value="requerimento">
                </form>

                <div class="">
                    <br>
                        <button type="button" class="btn btn-success statusmuda" id="aprovar" data-toggle="modal" data-target="#modalstatus">Aprovar</button>
                        <button type="button" class="btn btn-danger statusmuda" id="reprovar" data-toggle="modal" data-target="#modalstatus">Reprovar</button><br><br>
                </div>
            </div>
        </div>
   </div>
</div>

<div class="modal fade bd-example-modal-lg" id="modalstatus" tabindex="-1" role="dialog" aria-labelledby="modalstatusLabel">
 <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Atenção</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Tem certeza que deseja <span id="modalstatustexto"></span>?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
        <button type="button" class="btn btn-primary" id="enviaformstatusdado">Sim</button>
      </div>
    </div>
  </div>
</div>

@endcan
@include('layouts.footer')
@stop