@extends('adminlte::page')
@section('content_header')
<h1>Candidatos Cadastrados</h1>
@stop
@section('plugins.Datatables', true)
@section('content')
@can('admin')

<script>
function verificastatus()
{
    teste();
    
}
 </script>
<div class="row">
    <div class="col-12">
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
                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Nome</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >Formação</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >Pré-Qualificação</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >Finalizado</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >Excluir</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >Ver</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php foreach( $candidato as $value ): @endphp
                                    <tr class="odd">
                                        <td>@php echo strtoupper($value->name) @endphp</td>
                                        <td>{{ App\Http\Controllers\Admin\CandidatoController::profissao($value->id) }} </td>
                                        <td>{{ App\Http\Controllers\Admin\CandidatoController::prequalificacao($value->id) }} </td>
                                        <td>{{ App\Http\Controllers\Admin\CandidatoController::finalizado($value->id) }} </td>
                                        <td><i style="cursor: pointer;" data-candidatoex="@php echo $value->id @endphp"  data-nomecandidato="@php echo $value->name @endphp" data-toggle="modal" data-target="#modalexclui" class="fas fa-fw fa-trash"></i></td>
                                        <td><i style="cursor: pointer;" data-candidato="@php echo $value->id @endphp" data-toggle="modal" data-target="#exampleModal" class="fas  fa-edit"></i></td>
                                    </tr>
                                    @php endforeach; @endphp
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel"></h4>
            </div>
            <div class="modal-body">
                <div class="col-sm-12">
                    <table id="example1" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                        <thead>
                            <tr>
                                <th>Pré-qualificação</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="modalbody">
                            
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

@endcan

@include('layouts.footer')
@stop


