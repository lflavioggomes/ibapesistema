@extends('adminlte::page')
@section('content_header')
<h1>DashBoard</h1>
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
                                    </tr>
                                </thead>
                                <tbody>
                                    @php foreach( $candidato as $value ): @endphp
                                    <tr class="odd">
                                        <td>@php echo strtoupper($value->name) @endphp</td>
                                        <td>{{ App\Http\Controllers\Admin\CandidatoController::profissao($value->id) }} </td>
                                        <td>{{ App\Http\Controllers\Admin\CandidatoController::prequalificacao($value->id) }} </td>
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


@elsecan('candidato')
<p class="mt-3">Bem vindo candidato(a).</p>

<div class="col-md-12">
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-bullhorn"></i>
                Atenção
            </h3>
        </div>

        <div class="card-body">
            <div class="callout callout-danger">
                <p>Para realizar a prova o candidato(a) deverá completar as seguintes informações <strong>no menu lateral deste site:</strong></p>
               <p>Dados Pessoais; Requerimento; Declaração de Regularidade; Diploma de Graduação; Solicitação Justificada e
Comprovante de Pagamento.</p>
<p><strong>O status de cada informação deverá ser acompanhado no resumo abaixo.</strong></p>

<p>Após aprovação, você receberá um e-mail com as orientações para realização da prova.</p>

<p><strong><a href="dados">Clique aqui para iniciar sua inscrição</a></strong></p>
                
            </div>
        </div>

    </div>

</div>

<div class="card col-md-6">
    <div class="card-header">
        <h3 class="card-title">Pré-Qualificação</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    <div class="card-body p-0">
        <table class="table table-striped projects">
            <thead>
                <tr>
                    <th style="width: 1%">
                        #
                    </th>
                    <th style="width: 20%">
                        Qualificações
                    </th>
                    <th style="width: 8%" class="text-center">
                        Status
                    </th>
                    <th style="width: 20%">
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        #
                    </td>
                    <td>
                        Dados Pessoais
                        <br>
                        <small>
                            @if(!empty($dados->updated_at))
                            @php echo 'Atualização em '. date('d-m-Y', strtotime($dados->updated_at)); @endphp
                            @endif
                        </small>
                    </td>
                    <td class="project-state">
                        @if($dados->status_id == 1)
                        <span class="badge badge-success">Aprovado</span>

                        @elseif ($dados->status_id == 2)
                        <span class="badge badge-danger">Reprovado</span>

                        @elseif($dados->status_id == 3)
                        <span class="badge badge-warning">Em Análise</span>
                        @else
                        -
                        @endif
                    </td>
                    <td class="project-actions text-right">
                        @if($dados->status_id == 2)
                        <a class="btn btn-primary btn-sm" href="#">
                            <i class="fas fa-exclamation-triangle">
                            </i>
                            Ver Motivo
                        </a>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        #
                    </td>
                    <td>
                        Requerimento
                        <br>
                        <small>
                            @if(!empty($requerimento->updated_at))
                            @php echo 'Atualização em '. date('d-m-Y', strtotime($requerimento->updated_at)); @endphp
                            @endif
                        </small>
                    </td>
                    <td class="project-state">
                        @if($requerimento->status_id == 1)
                        <span class="badge badge-success">Aprovado</span>

                        @elseif ($requerimento->status_id == 2)
                        <span class="badge badge-danger">Reprovado</span>

                        @elseif($requerimento->status_id == 3)
                        <span class="badge badge-warning">Em Análise</span>
                        @else
                        -
                        @endif
                    </td>
                    <td class="project-actions text-right">
                    @if($requerimento->status_id == 2)
                        <a class="btn btn-primary btn-sm" href="#">
                            <i class="fas fa-exclamation-triangle">
                            </i>
                            Ver Motivo
                        </a>
                        @endif
                    </td>
                </tr>

                <tr>
                    <td>
                        #
                    </td>
                    <td>
                        Declaração de Regularidade
                        <br>
                        <small>
                            @if(!empty($declaracao->updated_at))
                            @php echo 'Atualização em '. date('d-m-Y', strtotime($declaracao->updated_at)); @endphp
                            @endif
                        </small>
                    </td>
                    <td class="project-state">
                        @if($declaracao->status_id == 1)
                        <span class="badge badge-success">Aprovado</span>

                        @elseif ($declaracao->status_id == 2)
                        <span class="badge badge-danger">Reprovado</span>

                        @elseif($declaracao->status_id == 3)
                        <span class="badge badge-warning">Em Análise</span>
                        @else
                        -
                        @endif
                    </td>
                    <td class="project-actions text-right">
                    @if($declaracao->status_id == 2)
                        <a class="btn btn-primary btn-sm" href="#">
                            <i class="fas fa-exclamation-triangle">
                            </i>
                            Ver Motivo
                        </a>
                        @endif
                    </td>
                </tr>

                <tr>
                    <td>
                        #
                    </td>
                    <td>
                        Diploma de Graduação
                        <br>
                        <small>
                            @if(!empty($diploma->updated_at))
                            @php echo 'Atualização em '. date('d-m-Y', strtotime($diploma->updated_at)); @endphp
                            @endif
                        </small>
                    </td>
                    <td class="project-state">
                        @if($diploma->status_id == 1)
                        <span class="badge badge-success">Aprovado</span>

                        @elseif ($diploma->status_id == 2)
                        <span class="badge badge-danger">Reprovado</span>

                        @elseif($diploma->status_id == 3)
                        <span class="badge badge-warning">Em Análise</span>
                        @else
                        -
                        @endif
                    </td>
                    <td class="project-actions text-right">
                    @if($diploma->status_id == 2)
                        <a class="btn btn-primary btn-sm" href="#">
                            <i class="fas fa-exclamation-triangle">
                            </i>
                            Ver Motivo
                        </a>
                        @endif
                    </td>
                </tr>

                <tr>
                    <td>
                        #
                    </td>
                    <td>
                        Solicitação Justificada
                        <br>
                        <small>
                            @if(!empty($solicitacao->updated_at))
                            @php echo 'Atualização em '. date('d-m-Y', strtotime($solicitacao->updated_at)); @endphp
                            @endif
                        </small>
                    </td>
                    <td class="project-state">
                        @if($solicitacao->status_id == 1)
                        <span class="badge badge-success">Aprovado</span>

                        @elseif ($solicitacao->status_id == 2)
                        <span class="badge badge-danger">Reprovado</span>

                        @elseif($solicitacao->status_id == 3)
                        <span class="badge badge-warning">Em Análise</span>
                        @else
                        -
                        @endif
                    </td>
                    <td class="project-actions text-right">
                    @if($solicitacao->status_id == 2)
                        <a class="btn btn-primary btn-sm" href="#">
                            <i class="fas fa-exclamation-triangle">
                            </i>
                            Ver Motivo
                        </a>
                        @endif
                    </td>
                </tr>

                <tr>
                    <td>
                        #
                    </td>
                    <td>
                        Pagamento
                        <br>
                        <small>
                            @if(!empty($comprovante->updated_at))
                            @php echo 'Atualização em '. date('d-m-Y', strtotime($comprovante->updated_at)); @endphp
                            @endif
                        </small>
                    </td>
                    <td class="project-state">
                        @if($comprovante->status_id == 1)
                        <span class="badge badge-success">Aprovado</span>

                        @elseif ($comprovante->status_id == 2)
                        <span class="badge badge-danger">Reprovado</span>

                        @elseif($comprovante->status_id == 3)
                        <span class="badge badge-warning">Em Análise</span>
                        @else
                        -
                        @endif
                    </td>
                    <td class="project-actions text-right">
                    @if($comprovante->status_id == 2)
                        <a class="btn btn-primary btn-sm" href="#">
                            <i class="fas fa-exclamation-triangle">
                            </i>
                            Ver Motivo
                        </a>
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</div>

@elsecan('julgador')
<p>Bem vindo julgador.</p>
@endcan

@include('layouts.footer')
@stop