@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
<h1>Dados Pessoais</h1>
@stop
@section('plugins.Datatables', true)
@section('content')
@can('admin')
    <div class="col-md-12">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Indentificação Pessoal</h3>
            </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Nome Completo</label>
                        <p> {{$name}}</p>
                    </div>
                    <div class="row">
                        <div class="col-3 mobileform">
                            <div class="form-group">
                                <label for="nacionalidade">Nacionalidade</label>
                                <p>{{$result->nacionalidade}} </p>
                            </div>
                        </div>
                        <div class="col-3 mobileform">
                            <div class="form-group">
                                <label for="naturalidade">Naturalidade</label>
                                <p>{{$result->naturalidade}}</p>
                            </div>
                        </div>
                        <div class="col-3 mobileform">
                            <div class="form-group">
                                <label for="sexo">sexo</label>
                                 <p>{{$result->sexo }}</p>
                            </div>
                        </div>
                        <div class="col-3 mobileform">
                            <div class="form-group">
                                <label for="nascimento">Nascimento</label>
                                <p>{{$result->nascimento == '' ? '': date('d-m-Y', strtotime($result->nascimento))}}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4 mobileform">
                            <div class="form-group">
                                <label for="rg">RG</label>
                                <p>{{$result->rg}}</p>
                            </div>
                        </div>
                        <div class="col-4 mobileform">
                            <div class="form-group">
                                <label for="emissor">Orgão Emissor</label>
                                <p>{{$result->emissor}}</p>
                            </div>
                        </div>
                        <div class="col-4 mobileform">
                            <div class="form-group">
                                <label for="cpf">CPF</label>
                                <p>{{$result->cpf}}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-header" style="color:#fff;">
                    <h3 class="card-title">Endereço Residencial</h3>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-3 mobileform">
                            <div class="form-group">
                                <label for="cep">CEP</label>
                                <p>{{$result->cep}}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4 mobileform">
                            <div class="form-group">
                                <label for="name">Logradouro</label>
                               <p>{{$result->endereco}}</p>
                            </div>
                        </div>
                        <div class="col-4 mobileform">
                            <div class="form-group">
                                <label for="nacionalidade">Número</label>
                               <p>{{$result->numero}}</p>
                            </div>
                        </div>
                        <div class="col-4 mobileform">
                            <div class="form-group">
                                <label for="nacionalidade">Complemento</label>
                                <p>{{$result->complemento}}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4 mobileform">
                            <div class="form-group">
                                <label for="naturalidade">Bairro</label>
                                <p>{{$result->bairro}}</p>
                            </div>
                        </div>
                        <div class="col-4 mobileform">
                            <div class="form-group">
                                <label for="naturalidade">Cidade</label>
                                <p>{{$result->cidade}}</p>
                            </div>
                        </div>

                        <div class="col-4 mobileform">
                            <div class="form-group">
                                <label for="nascimento">Estado</label>
                               <p>{{$result->estado}}</p>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-4 mobileform">
                            <div class="form-group">
                                <label for="nascimento">País</label>
                                <p>{{$result->pais}}</p>
                            </div>
                        </div>
                        <div class="col-4 mobileform">
                            <div class="form-group">
                                <label for="rg">Telefone Celular</label>
                                <p>{{$result->telefone}}</p>
                            </div>
                        </div>
                        <div class="col-4 mobileform">
                            <div class="form-group">
                                <label for="dataemissao">Email</label>
                               <p>{{$email}}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-header" style="color:#fff;" required>
                    <h3 class="card-title">Formação Profissional</h3>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-6 mobileform">
                            <div class="form-group">
                                <label for="sexo">Profissão</label>
                                    <p>{{$result->formacao}}</p>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-8 mobileform">
                            <div class="form-group">
                                <label for="name">Número de Registro no CREA/CAU - <small>(Coloque conforme consta em registro profissional)</small></label>
                                <p>{{$result->crea}}</p>
                            </div>
                        </div>
                    </div>

                   
                </div>

                <div class="card-footer">
                    <br>
                        <button type="button" class="btn btn-success" id="aprovar" data-toggle="modal" data-target="#exampleModal">Aprovar</button>
                        <button type="button" class="btn btn-danger" id="reprovar" data-toggle="modal" data-target="#exampleModal">Reprovar</button><br><br>
                </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
 <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Atenção</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Tem certeza que deseja?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
        <button type="button" class="btn btn-primary">Sim</button>
      </div>
    </div>
  </div>
</div>

@endcan
@include('layouts.footer')
@stop