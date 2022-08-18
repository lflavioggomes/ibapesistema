@extends('adminlte::page')
@section('content_header')
<h1>Dados para Pagamento</h1>
@stop

@section('content')
@php
    if($comprovante == ''):
@endphp
<div class="invoice p-3 mb-3">
    <div class="row">
    <div class="col-12">
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

<div class="row">
    <div class="col-lg-12">
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
<div class="row">
    <div class="col-lg-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h5 class="m-0">Comprovante enviado</h5>
            </div>
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