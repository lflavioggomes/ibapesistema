@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
@section('plugins.Datatables', true)
<h1>Formação Profissional e Acadêmica - Cadastro</h1>
@stop
@section('content')

<div class="row">
    <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/formacao">Formação</a></li>
            <li class="breadcrumb-item">Cadastro</li>
        </ol>
    </div>
</div>

<div class="row">  
    <div class="col-md-6">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Envio de Formação</h3>
            </div>

            <div class="col-md-12 pontoformacao" style="display:none;">
            <div class="col-md-6 float-sm-right">
                <a class="btn btn-app bg-success mt-3 float-sm-right">
                    <i class="fas" id="ponto">0</i> Pontos
                </a>
            </div>
            </div>

            <form method="POST" action="{{route('site.formacao.form')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="previaponto" id="previaponto" value="">
                <div class="card-body">
                    
                <div class="form-group">
                        <label for="graduacao">Nível</label>
                        <select class="form-control" id="nivel" name="nivel" required>
                                    <option value="">Selecione</option>
                                    <option value="Graduação Adicional área especifica" data-ponto="25">Graduação Adicional área especifica</option>
                                    <option value="Graduação Adicional área afim" data-ponto="15">Graduação Adicional área afim</option>
                                    <option value="Especialização área específica/IBAPE" data-ponto="25">Especialização área específica/IBAPE</option>
                                    <option value="Especialização área específica/Outros" data-ponto="15">Especialização área específica/Outros</option>
                                    <option value="Especialização área afim/IBAPE" data-ponto="15">Especialização área afim/IBAPE</option>
                                    <option value="Especialização área afim/Outros" data-ponto="10">Especialização área afim/Outros</option>
                                    <option value="Mestrado área específica" data-ponto="35">Mestrado área específica</option>
                                    <option value="Mestrado área afim" data-ponto="25">Mestrado área afim</option>
                                    <option value="Doutorado área específica" data-ponto="40">Doutorado área específica</option>
                                    <option value="Doutourado área afim" data-ponto="30">Doutourado área afim</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="graduacao">Titulação</label>
                        <input type="text" class="form-control" id="titulacao" name="titulacao" value="" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="graduacao">Instituição</label>
                        <input type="text" class="form-control" id="instituicao" name="instituicao" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="graduacao">Início</label>
                        <input type="text" class="form-control date" id="inicio" name="inicio" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="graduacao">Término</label>
                        <input type="text" class="form-control date" id="termino" name="termino" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="diploma">Diploma - <small>Certificado Frente e Verso</small></label>
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