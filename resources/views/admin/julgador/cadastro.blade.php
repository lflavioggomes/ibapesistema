@extends('adminlte::page')
@section('content_header')
@section('plugins.Datatables', true)
<h1>Julgador - Cadastro</h1>
@stop
@section('content')

<div class="row">
    <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('julgador')}}">Julgador</a></li>
            <li class="breadcrumb-item">Cadastro</li>
        </ol>
    </div>
</div>

<div class="row">  
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Cadastro de Julgador</h3>
            </div>

            <div class="col-md-12 pontoformacao" style="display:none;">
            <div class="col-md-6 float-sm-right">
                <a class="btn btn-app bg-success mt-3 float-sm-right">
                    <i class="fas" id="ponto">0</i> Pontos
                </a>
            </div>
            </div>

            <form method="POST" action="{{route('admin.julgador.form')}}" enctype="multipart/form-data">
            @csrf
                <div class="card-body">

                <div class="form-group">
                    <label for="graduacao">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="" required>
                </div>    
                    
                <div class="form-group">
                        <label for="graduacao">Status</label>
                        <select class="form-control" name="status_id" required>
                                    <option value="">Selecione</option>
                                    <option value="4">Ativo</option>
                                    <option value="5">Inativo</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="graduacao">Candidatos</label>
                        <select class="form-control select2 " multiple name="candidato[]" required>
                                    <option value="">Selecione</option>
                                    @foreach ($candidato as $item)
                                        <option value="{{ $item->id  }}">{{ $item->name }}</option>
                                    @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="graduacao">Avaliações</label>
                        <select class="form-control select2 " multiple name="avaliacao[]" required>
                                    <option value="">Selecione</option>
                                    <option value="formacao">Formação Acadêmica</option>
                                    <option value="capacidade">Capacidade Técnica</option>
                                    <option value="analisetrabalho">Análise de Trabalhos</option>
                                    <option value="analisecurricular">Análise Curricular</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="graduacao">E-mail</label>
                        <input type="text" class="form-control" id="email" name="email" value="" required>
                    </div>  

                    <div class="form-group">
                        <label for="graduacao">Senha</label>
                        <input type="text" class="form-control" id="senha" name="senha" value="" required>
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