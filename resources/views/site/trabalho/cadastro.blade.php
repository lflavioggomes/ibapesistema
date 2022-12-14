@extends('adminlte::page')
@section('content_header')
@section('plugins.Datatables', true)
<h1>Trabalhos e Palestras - Cadastro</h1>
@stop
@section('content')

<div class="row">
    <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('trabalho')}}">Trabalhos e Palestras</a></li>
            <li class="breadcrumb-item">Cadastro</li>
        </ol>
    </div>
</div>

<div class="row">  
    <div class="col-sm-12 col-md-12">
        <div class="card card-default col-md-6">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-bullhorn"></i>
                    Atenção
                </h3>
            </div>
    
            <div class="card-body">
                <div class="callout callout-danger">
                    <p><strong> Trabalhos e Palestras apresentados em congressos, Seminários, Simpósios e correlatos na área da Certificação e publicados. Não devem ser relacionados, Trabalhos Premiados que serão relacionados no menu correspondente.</strong></p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Trabalhos e Palestras</h3>
            </div>

            <div class="col-md-12 pontoformacao" style="display:none;">
            <div class="col-md-6 float-sm-right">
                <a class="btn btn-app bg-success mt-3 float-sm-right">
                    <i class="fas" id="ponto">0</i> Pontos
                </a>
            </div>
            </div>

            <form method="POST" action="{{route('site.trabalho.form')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="previaponto" id="previaponto" value="">
                <div class="card-body">

                <div class="form-group">
                    <label for="graduacao">Evento</label>
                    <select class="form-control trabalho" id="eventotrabalho" name="evento" required>
                                    <option value="">Selecione</option>
                                    <option value="Congresso" data-pontoevento="2">Congresso</option>
                                    <option value="Seminário" data-pontoevento="1">Seminário</option>
                                    <option value="Simpósio" data-pontoevento="0">Simpósio</option>
                                    <option value="Outros" data-pontoevento="0">Outros</option>
                    </select>
                </div>
                    
                <div class="form-group">
                        <label for="graduacao">Entidade</label>
                        <select class="form-control trabalho" id="entidadetrabalho" name="entidade" required>
                                    <option value="">Selecione</option>
                                    <option value="IBAPE/UPAV" data-pontoentidade="1">IBAPE/UPAV</option>
                                    <option value="Outros"  data-pontoentidade="1">Outros</option>
                        </select>
                    </div>

                   

                    <div class="form-group">
                        <label for="graduacao">Avaliação</label>
                        <select class="form-control" name="avaliacao" required>
                                    <option value="">Selecione</option>
                                    <option value="Imóveis Urbanos">Imóveis Urbanos</option>
                                    <option value="Imóveis Rurais">Imóveis Rurais</option>
                                    <option value="Empreeendimentos">Empreeendimentos</option>
                                    <option value="Máq Eq Inst Industriais">Máq Eq Inst Industriais</option>
                                    <option value="Rucursos Naturais">Rucursos Naturais</option>
                                    <option value="Patr Hist e Artístico">Patr Hist e Artístico</option>
                                    <option value="Avaliação - Diversas">Avaliação - Diversas</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="graduacao">Nome do Trabalho</label>
                        <input type="text" class="form-control" id="trabalho" name="trabalho" value="" required>
                    </div>

                    <div class="form-group">
                        <label for="graduacao">Evento</label>
                        <select class="form-control" name="evento" required>
                                    <option value="">Selecione</option>
                                    <option value="Congresso">Congresso</option>
                                    <option value="Seminário">Seminário</option>
                                    <option value="Simpósio">Simpósio</option>
                                    <option value="Outros">Outros</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="diploma">Arquivo</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="form-control" id="arquivo" name="arquivo" required>
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

@include('layouts.footer')
@stop