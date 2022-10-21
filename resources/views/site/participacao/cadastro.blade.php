@extends('adminlte::page')
@section('content_header')
@section('plugins.Datatables', true)
<h1>Participação em Congressos e Correlatos - Cadastro</h1>
@stop
@section('content')

<div class="row">
    <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('participacao')}}">Participação em Congressos e Correlatos</a></li>
            <li class="breadcrumb-item">Cadastro</li>
        </ol>
    </div>
</div>

<div class="row">  
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Participação em Congressos e Correlatos</h3>
            </div>

            <div class="col-md-12 pontoformacao" style="display:none;">
            <div class="col-md-6 float-sm-right">
                <a class="btn btn-app bg-success mt-3 float-sm-right">
                    <i class="fas" id="ponto">0</i> Pontos
                </a>
            </div>
            </div>

            <form method="POST" action="{{route('site.participacao.form')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="previaponto" id="previaponto" value="">
                <div class="card-body">
                    
                <div class="form-group">
                        <label for="graduacao">Evento</label>
                        <select class="form-control trabalhoparticipacao" id="eventoparticipacao" name="evento" required>
                                    <option value="">Selecione</option>
                                    <option value="Congresso" data-ponto="5">Congresso</option>
                                    <option value="Seminário" data-ponto="4">Seminário</option>
                                    <option value="Cursos" data-ponto="3">Cursos</option>
                                    <option value="Outros" data-ponto="3">Outros</option>

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="graduacao">Entidade</label>
                        <select class="form-control trabalhoparticipacao" id="entidadeparticipacao" name="entidade" required>
                                    <option value="">Selecione</option>
                                    <option value="IBAPE/UPAV" data-pontoentidade="1">IBAPE/UPAV</option>
                                    <option value="Outros"  data-pontoentidade="1">Outros</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="graduacao">Avaliação</label>
                        <select class="form-control" id="avaliacao" name="avaliacao" required>
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
                        <label for="graduacao">Nome do Evento</label>
                        <input type="text" class="form-control" id="nome" name="nome" value="" required>
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