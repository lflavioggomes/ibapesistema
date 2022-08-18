@extends('adminlte::page')
@section('content_header')
<h1>Diploma de Graduação</h1>
@stop

@section('content')

@php
    if($diploma == ''):
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
                        <input type="text" class="form-control" id="graduacao" name="graduacao" required>
                    </div>
                    <div class="form-group">
                        <label for="diploma">Diploma</label>
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
<div class="row">
    <div class="col-lg-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h5 class="m-0">Seu Diploma foi enviado</h5>
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