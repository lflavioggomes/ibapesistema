@extends('adminlte::page')
@section('content_header')
@section('plugins.Datatables', true)
<h1>Divulgação de Material Técnico - Cadastro</h1>
@stop
@section('content')
<div class="row">
    @include('layouts.aviso')
    <div class="col-sm-6 col-md-6 ">
        <a class="btn btn-app btn-primary mt-3 float-sm-right" href="divulgacao/cadastro">
            <i class="fas  fa-plus" style="text-align:center;"></i> Cadastrar
        </a>

        <a class="btn btn-app bg-success mt-3 float-sm-right">
            <i class="fas">{{ App\Http\Controllers\Site\DivulgacaoController::ponto()}}</i> Pontos
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
                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Titulo</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Tipo</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Editora</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Edição</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Idioma</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Meio Publicação</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Publicação</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Status</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Pontos</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($divulgacao as $value)
                                <tr class="odd">
                                    <td>{{$value->titulo}}</td>
                                    <td>{{$value->tipo}}</td>
                                    <td>{{$value->editora}}</td>
                                    <td>{{$value->edicao}}</td>
                                    <td>{{$value->idioma}}</td>
                                    <td>{{$value->meio}}</td>
                                    <td>{{date('d-m-Y', strtotime($value->ano))}}</td>
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


</div>

</div>
@include('layouts.footer')
@stop