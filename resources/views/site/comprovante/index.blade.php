@extends('adminlte::page')
@section('content_header')
<h1>Comprovante de Pagamento</h1>
@stop

@section('content')
<div class="invoice p-3 mb-3">
    <div class="row">
    <div class="col-6">
            <p class="lead">Dados para pagamento:</p>
            <div class="table-responsive">
                <table class="table">
                    <tbody>
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
@stop
@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!');
</script>
@stop