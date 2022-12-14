@extends('adminlte::page')
@section('content_header')
@section('plugins.Datatables', true)
<h1>Trabalhos Premiados em Congressos e correlatos - Cadastro</h1>
@stop
@section('content')

<div class="row">
    <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('premiado')}}">Trabalhos Premiados em Congressos e correlatos</a></li>
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
                    <p><strong> Trabalhos premiados em Congressos, Seminários, Simpósios e correlatos na Área da Certificação e publicados. Não devem ser relacionados os Trabalhos relacionados ao menu Trabalhos e Palestras.</strong></p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Trabalhos Premiados em Congressos e correlatos</h3>
            </div>

            <div class="col-md-12 pontoformacao" style="display:none;">
            <div class="col-md-6 float-sm-right">
                <a class="btn btn-app bg-success mt-3 float-sm-right">
                    <i class="fas" id="ponto">0</i> Pontos
                </a>
            </div>
            </div>

            <form method="POST" action="{{route('site.premiado.form')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="previaponto" id="previaponto" value="">
                <div class="card-body">

                <div class="form-group">
                    <label for="graduacao">Evento</label>
                    <select class="form-control trabalhopremiado" id="eventopremiado" name="evento" required>
                                <option value="">Selecione</option>
                                <option value="Congresso">Congresso</option>
                                <option value="Seminário">Seminário</option>
                                <option value="Simpósio">Simpósio</option>
                                <option value="Outros">Outros</option>
                    </select>
                </div>    
                    
                <div class="form-group">
                        <label for="graduacao">Entidade</label>
                        <select class="form-control trabalhopremiado" id="entidadepremiado" name="entidade" required>
                                    <option value="">Selecione</option>
                                    <option value="IBAPE/UPAV" data-ponto="3">IBAPE/UPAV</option>
                                    <option value="Outros" data-ponto="2">Outros</option>
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