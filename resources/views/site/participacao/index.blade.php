@extends('adminlte::page')
@section('content_header')
@section('plugins.Datatables', true)
<h1>Participação em Congressos e Correlatos</h1>
@stop

@section('content')

<div class="row">
    <div class="col-sm-6 col-md-6 ">
        <a class="btn btn-app btn-primary mt-3 float-sm-left" href="participacao/cadastro" id="cadastroplus">
            <i class="fas  fa-plus" style="text-align:center;"></i> Cadastrar
        </a>

        <a class="btn btn-app bg-success mt-3 float-sm-left">
            <i class="fas">{{ App\Http\Controllers\Site\ParticipacaoController::ponto()}}</i> Pontos
        </a>
    </div>
    <div class="card">
        <div class="card-header">
            <!-- <h3 class="card-title"></h3> -->
        </div>

        <div class="card-body">
            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12 col-md-6"></div>
                    <div class="col-sm-12 col-md-6"></div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table id="example1" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                            <thead>
                                <tr>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Arquivo</th>
                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Evento</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Avaliação</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Nome</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Status</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Pontos</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($analise as $value)
                                <tr class="odd">
                                    <td> <a target="_blank" href="{{ url('storage/participacao/'.$value->arquivo) }}">Ver</a></td>
                                    <td>{{$value->evento}}</td>
                                    <td>{{$value->avaliacao}}</td>
                                    <td>{{$value->nome}}</td>
                                    <td>{{$value->status}}</td>
                                    <td>{{$value->previaponto}}</td>
                                </tr>
                               @endforeach 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @include('layouts.aviso')
</div>

</div>

@include('layouts.footer')
@stop