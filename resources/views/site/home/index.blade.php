@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
<h1>Dashboard</h1>
@stop

@section('content')
@can('admin')
<p>Bem vindo {{$name}}</p>

<div class="row">
    
    <div class="col-lg-4 col-6">

        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{count($candidato)}}</h3>
                <p>Candidatos</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">Veja mais <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-4 col-6">
        

        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{count($julgador)}}<sup style="font-size: 20px"></sup></h3>
                <p>Julgadores</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">Veja mais <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-4 col-6">

        <div class="small-box bg-warning">
            <div class="inner">
                <h3>4</h3>
                <p>Aguardando Análise</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">Veja mais <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <!-- <div class="col-lg-3 col-6">

        <div class="small-box bg-danger">
            <div class="inner">
                <h3>65</h3>
                <p>Unique Visitors</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div> -->

</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Candidatos Recentes</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Formação</th>
                            <th>Pré Qualificação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php foreach( $candidato as $value ): @endphp
                        <tr>
                            <td>@php echo $value->name @endphp</td>
                            <td>Engenheiro Civil</td>
                            <td> <i class="fas  fa-edit"></i></td>
                        </tr>
                        @php endforeach; @endphp
                    </tbody>
                </table>
            </div>

        </div>

    </div>
</div>
@elsecan('candidato')
<p>Bem vindo candidato.</p>
@elsecan('julgador')
<p>Bem vindo julgador.</p>
@endcan

@include('layouts.footer')
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!');
</script>
@stop

