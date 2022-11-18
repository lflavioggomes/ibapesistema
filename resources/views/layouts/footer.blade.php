<div class="modal fade bd-example-modal-lg" id="modalalert" tabindex="-1" role="dialog" aria-labelledby="modalalertLabel">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">    <i class="fas fa-bullhorn"></i> Atenção</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="col-sm-12">
                    <p id="alert"></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade bd-example-modal-lg" id="modalfinaliza" tabindex="-1" role="dialog" aria-labelledby="modalalertLabel">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">    <i class="fas fa-bullhorn"></i> Atenção</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="col-sm-12">
                    <p>Tem certeza que deseja finalizar o envio de sua documentação?</p>
                    <p>Ao clicar em Sim, as informações serão enviadas para análise e não poderão ser editadas novamente.</p>
                </div>
                <div class="card-footer">
                  
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
                <form method="POST" action="{{route('site.finaliza')}}">
                    @csrf
                    <input type="hidden" name="finaliza" value="1">
                <button type="submit" class="btn btn-primary">Sim</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" id="modalexclui" tabindex="-1" role="dialog" aria-labelledby="modalalertLabel">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">    <i class="fas fa-bullhorn"></i> Atenção</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="col-sm-12">
                    <p>Deseja Excluir esse Registro o Candidato <span id="nomecandidato" style="font-weight: bold;text-transform: uppercase;"></span>?</p>
                </div>
                <div class="card-footer">
                  
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
                <form method="POST" action="{{route('admin.candidato.exclui')}}">
                    @csrf
                    <input type="hidden" name="excluircandidato" value="1">
                    <input type="hidden" name="excluircandidatoid" id="excluircandidato" value="">
                <button type="submit" class="btn btn-primary">Sim</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" id="modalexclui" tabindex="-1" role="dialog" aria-labelledby="modalalertLabel">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">    <i class="fas fa-bullhorn"></i> Atenção</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="col-sm-12">
                    <p>Deseja Excluir esse Registro do Candidato <span id="nomecandidato" style="font-weight: bold;text-transform: uppercase;"></span>?</p>
                </div>
                <div class="card-footer">
                  
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
                <form method="POST" action="{{route('admin.candidato.exclui')}}">
                    @csrf
                    <input type="hidden" name="excluircandidato" value="1">
                    <input type="hidden" name="excluircandidatoid" id="excluircandidato" value="">
                <button type="submit" class="btn btn-primary">Sim</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" id="modalexcluitrabalho" tabindex="-1" role="dialog" aria-labelledby="modalalertLabel">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">    <i class="fas fa-bullhorn"></i> Atenção</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="col-sm-12">
                    <p>Deseja Excluir esse Registro?</p>
                </div>
                <div class="card-footer">
                  
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
                <form method="POST" action="{{route('site.finaliza.exclui')}}">
                    @csrf
                    <input type="hidden" name="table" id="table" value="">
                    <input type="hidden" name="trabalhoid" id="trabalhoid" value="">
                    <input type="hidden" name="caminho" id="caminho" value="">
                    
                <button type="submit" class="btn btn-primary">Sim</button>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade bd-example-modal-lg" id="analisetrabalho" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel" id="nometrabalhojulgador"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="col-sm-12">
                    <table id="example1" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                        <thead class="thea">
                            <tr>
                                <th>#</th>
                                <th>Arquivo</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="modalbody">
                            <div style="text-align: center">
                            <img style="width:30%;" class="imgcarregando" src="{{asset('image/carregando.gif')}}">
                            </div>
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


<div class="modal fade bd-example-modal-lg" id="analisecurricular" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel" id="nometrabalhojulgador"></h4>
            </div>
            <div class="modal-body">
                <div class="col-sm-12">
                    <table id="example1" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                        <thead class="thea">
                            <tr>
                                <th>#</th>
                                <th>Arquivo</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="modalbody">
                            <div style="text-align: center">
                            <img style="width:30%;" class="imgcarregando" src="{{asset('image/carregando.gif')}}">
                            </div>
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

<footer class="main-footer">
    <strong>Certificação Profissional em Engenharia de Avaliações IBAPE NACIONAL</strong>

    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.13.0
    </div>
</footer>

@section('css')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@stop

@section('js')
<script type="text/javascript" src="{{asset('js/jquery.mask.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/resumablejs@1.1.0/resumable.min.js"></script>
<script type="text/javascript" src="{{asset('js/funcoes.js')}}"></script>

@stop