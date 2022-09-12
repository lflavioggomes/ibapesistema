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
                    <!-- <th style="width: 20%">
                    </th> -->
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        #
                    </td>
                    <td>
                        Dados Pessoais 
                        {{ $dados = App\Http\Controllers\Admin\CandidatoController::statusinclude($_GET['id']) }}
                        <br>
                        <small>
                            @if(!empty($dados->updated_at))
                            @php echo 'Atualização em '. date('d-m-Y', strtotime($dados->updated_at)); @endphp
                            @endif
                        </small>
                    </td>
                    <td class="project-state">
                        @if($dados['dados']->status_id == 1)
                        <span class="badge badge-success">Aprovado</span>

                        @elseif ($dados['dados']->status_id == 2)
                        <span class="badge badge-danger">Reprovado</span>

                        @elseif($dados['dados']->status_id == 3)
                        <span class="badge badge-warning">Em Análise</span>
                        @else
                        -
                        @endif
                    </td>
                    <!-- <td class="project-actions text-right">
                        @if($dados->status_id == 2)
                        <a class="btn btn-primary btn-sm" href="#">
                            <i class="fas fa-exclamation-triangle">
                            </i>
                            Ver Motivo
                        </a>
                        @endif
                    </td> -->
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
                    <!-- <td class="project-actions text-right">
                    @if($requerimento->status_id == 2)
                        <a class="btn btn-primary btn-sm" href="#">
                            <i class="fas fa-exclamation-triangle">
                            </i>
                            Ver Motivo
                        </a>
                        @endif
                    </td> -->
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
                    <!-- <td class="project-actions text-right">
                    @if($declaracao->status_id == 2)
                        <a class="btn btn-primary btn-sm" href="#">
                            <i class="fas fa-exclamation-triangle">
                            </i>
                            Ver Motivo
                        </a>
                        @endif
                    </td> -->
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
                    <!-- <td class="project-actions text-right">
                    @if($diploma->status_id == 2)
                        <a class="btn btn-primary btn-sm" href="#">
                            <i class="fas fa-exclamation-triangle">
                            </i>
                            Ver Motivo
                        </a>
                        @endif
                    </td> -->
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
                    <!-- <td class="project-actions text-right">
                    @if($solicitacao->status_id == 2)
                        <a class="btn btn-primary btn-sm" href="#">
                            <i class="fas fa-exclamation-triangle">
                            </i>
                            Ver Motivo
                        </a>
                        @endif
                    </td> -->
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
                    <!-- <td class="project-actions text-right">
                    @if($comprovante->status_id == 2)
                        <a class="btn btn-primary btn-sm" href="#">
                            <i class="fas fa-exclamation-triangle">
                            </i>
                            Ver Motivo
                        </a>
                        @endif
                    </td> -->
                </tr>
            </tbody>
        </table>
    </div>

</div>