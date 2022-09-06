@extends('adminlte::page')
@section('content_header')
<h1>Dados para Pagamento</h1>
@stop

@section('content')

<div class="invoice  mb-3 col-lg-5">
    <div class="row">
    <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <th>Investimento: R$ 900,00</th>
                        </tr>

                        <tr>
                            <th>Formas de pagamento: Depósito ou Transferência</th>
                        </tr>

                        <tr>
                            <th style="width:50%">Banco: Itaú</th>
                        </tr>
                        <tr>
                            <th>Agência: 0349</th>
                        </tr>
                        <tr>
                            <th>Conta Corrente: 36381-2</th>
                        </tr>
                        <tr>
                            <th>CNPJ: 61.796.835.0001-94</th>
                        </tr>
                        <tr>
                            <th>Pix: 61.796.835.0001-94</th>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- <p class="lead">Caso já tenha efetuado o pagamento, envie o comprovante abaixo:</p> -->
        </div>
    </div>
</div>
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
            Comprovante Reprovado
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
            <form method="POST" action="{{route('site.comprovante.form')}}" enctype="multipart/form-data">
            @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="diploma">Comprovante</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="form-control" id="comprovante" name="comprovante" required>
                            </div>
                        </div>
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
