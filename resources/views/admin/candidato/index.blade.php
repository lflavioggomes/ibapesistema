@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
<h1>Candidatos Cadastrados</h1>
@stop
@section('plugins.Datatables', true)
@section('content')
@can('admin')

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
                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Nome</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Formação</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Pré-Qualificação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php foreach( $candidato as $value ): @endphp
                                    <tr class="odd">
                                        <td>@php echo $value->name @endphp</td>
                                        <td>Engenheiro Civil</td>
                                        <td><i data-candidato="@php echo $value->id @endphp" data-toggle="modal" data-target="#exampleModal" class="fas  fa-edit"></i></td>
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
                            <tr class="odd">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><i data-toggle="modal" data-target="#exampleModal" class="fas  fa-edit"></i></td>
                            </tr>
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


@stop

@section('css')
<!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
@stop

@section('js')
<script>
    $(document).ready(function() {
        $('#example1').DataTable({
        language: {
            lengthMenu: '_MENU_ quantidade por página',
            zeroRecords: 'Não encontrado',
            info: 'Mostrando _PAGE_ de _PAGES_',
            infoEmpty: 'Sem Registros',
            infoFiltered: '(filtrado de _MAX_ total de registros)',
            search:      'Procurar:',
            paginate: {
                        "first":      "Primeiro",
                        "last":       "Último",
                        "next":       "Próximo",
                        "previous":   "Anterior"
                    },
        },
    });
    
        $('#exampleModal').on('show.bs.modal', function(event) {
            let button = $(event.relatedTarget);
            var modal = $(this);
            let id = button.data('candidato');
            $.get("candidato/list", {
                    id: id
                })
                .done(function(data) {
                    modal.find('.modalbody').html(data);
                });
        })
    });
    console.log('Hi!');
</script>
@stop