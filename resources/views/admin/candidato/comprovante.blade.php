@extends('adminlte::page')
@section('content_header')
<h1>Dados para Pagamento</h1>
@stop

@section('plugins.Datatables', true)
@section('content')

@php
if( $status == 1 ):
@endphp

<div class="row">
    <div class="col-lg-6">
        <div class="alert bg-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-info"></i> Atenção!</h5>
            Comprovante Aprovado
        </div>
    </div>
</div>

@php
endif;
@endphp

@php
if( $status == 2 ):
@endphp
<div class="row">
    <div class="col-lg-6">
        <div class="alert bg-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-exclamation-triangle"></i> Atenção!</h5>
            Comprovante Reprovado
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
            Comprovante Em Análise
        </div>
    </div>
</div>
@php
endif;
@endphp


<div class="row">
    <div class="col-lg-6">
    <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Envio de Comprovante</h3>
            </div>
            <div class="card-body">
            <form method="post" action="{{route('admin.candidato.statusdado')}}" id="formdadosadmin">
                @csrf

                <a class="btn btn-app bg-info mt-3" href="{{ url('storage/comprovante/'.$result->comprovante) }}" target="_blank">
                    <i class="fas fa-barcode " style="text-align:center;"></i> Ver Comprovante
                </a>

                    <input type="hidden" name="id" id="id_dado" value="{{$result->id}}">
                    <input type="hidden" name="status_id" id="status_id_admin" value="">
                    <input type="hidden" name="tabela" id="tabela" value="comprovante">
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

@include('layouts.footer')
@stop
