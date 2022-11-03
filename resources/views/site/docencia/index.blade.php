@extends('adminlte::page')
@section('content_header')
@section('plugins.Datatables', true)
<h1>1.5 - Exercício da Docência</h1>
@stop
@section('content')
<div class="row">
    <div class="col-sm-6 col-md-6 ">
        <a class="btn btn-app btn-primary mt-3 float-sm-left" href="{{url('docencia/cadastro')}}">
            <i class="fas  fa-plus" style="text-align:center;"></i> Cadastrar
        </a>

        <a class="btn btn-app bg-success mt-3 float-sm-left">
            <i class="fas">{{ App\Http\Controllers\Site\DocenciaController::ponto()}}</i> Pontos
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
                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Curso</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Nivel</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Instituição</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Status</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Pontos</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($docencia as $value)
                                <tr class="odd">
                                    <td>{{$value->curso}}</td>
                                    <td>{{$value->nivel}}</td>
                                    <td>{{$value->instituicao}}</td>
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