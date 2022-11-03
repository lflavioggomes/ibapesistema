@extends('adminlte::page')
@section('content_header')
<h1>Dados Pessoais Candidato</h1>
@stop
@section('plugins.Datatables', true)
@section('content')

@php
if( empty($result->status_id) || $result->status_id == 2 ):
@endphp
@php
if( $result->status_id == 2 ):
@endphp
<div class="row">
    <div class="col-lg-6">
        <div class="alert bg-danger info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-exclamation-triangle"></i> Atenção!</h5>
            Dados Pessoais Reprovados
        </div>
    </div>
</div>
@php
endif;
@endphp
<div class="row">
    <div class="col-md-12">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Indentificação Pessoal</h3>
            </div>
            <form method="post" action="{{route('site.dados.form')}}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Nome Completo</label>
                        <input type="name" class="form-control" id="name" name="name" placeholder="" value="{{$name}}" onkeyup="maiuscula(this)" required>
                    </div>
                    <div class="row">
                        <div class="col-3 mobileform">
                            <div class="form-group">
                                <label for="nacionalidade">Nacionalidade</label>
                                <input type="text" class="form-control" id="nacionalidade" name="nacionalidade" value="{{$result->nacionalidade}}" onkeyup="maiuscula(this)" required>
                            </div>
                        </div>
                        <div class="col-3 mobileform">
                            <div class="form-group">
                                <label for="naturalidade">Naturalidade</label>
                                <input type="text" class="form-control" id="naturalidade" name="naturalidade" placeholder="" value="{{$result->naturalidade}}" onkeyup="maiuscula(this)" required>
                            </div>
                        </div>
                        <div class="col-3 mobileform">
                            <div class="form-group">
                                <label for="sexo">sexo</label>
                                <select class="form-control" id="sexo" name="sexo" required>
                                    <option value="">SELECIONE</option>
                                    <option value="MASCULINO" {{$result->sexo == 'MASCULINO' ? 'selected': ''}}>MASCULINO</option>
                                    <option value="FEMININO" {{$result->sexo == 'FEMININO' ? 'selected': ''}}>FEMININO</option>
                                    <option value="NÃO QUERO INFORMAR" {{$result->sexo == 'NÃO QUERO INFORMAR' ? 'selected': ''}}>NÃO QUERO INFORMAR</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-3 mobileform">
                            <div class="form-group">
                                <label for="nascimento">Nascimento</label>
                                <input type="text" class="form-control date" id="nascimento" name="nascimento" value="{{$result->nascimento == '' ? '': date('d-m-Y', strtotime($result->nascimento))}}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4 mobileform">
                            <div class="form-group">
                                <label for="rg">RG</label>
                                <input type="text" class="form-control" id="rg" name="rg" placeholder="" value="{{$result->rg}}" onkeyup="maiuscula(this)" required>
                            </div>
                        </div>
                        <div class="col-4 mobileform">
                            <div class="form-group">
                                <label for="emissor">Orgão Emissor</label>
                                <input type="text" class="form-control" id="emissor" name="emissor" placeholder="" value="{{$result->emissor}}" onkeyup="maiuscula(this)" required>
                            </div>
                        </div>
                        <div class="col-4 mobileform">
                            <div class="form-group">
                                <label for="cpf">CPF</label>
                                <input type="text" class="form-control cpf" id="cpf" name="cpf" placeholder="" value="{{$result->cpf}}" required>
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
                                <input type="text" class="form-control cep" id="cep" name="cep" placeholder="" value="{{$result->cep}}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4 mobileform">
                            <div class="form-group">
                                <label for="name">Logradouro</label>
                                <input type="name" class="form-control" id="endereco" name="endereco" placeholder="" value="{{$result->endereco}}" onkeyup="maiuscula(this)" required>
                            </div>
                        </div>
                        <div class="col-4 mobileform">
                            <div class="form-group">
                                <label for="nacionalidade">Número</label>
                                <input type="text" class="form-control" id="numero" name="numero" placeholder="" value="{{$result->numero}}" onkeyup="maiuscula(this)" required>
                            </div>
                        </div>
                        <div class="col-4 mobileform">
                            <div class="form-group">
                                <label for="nacionalidade">Complemento</label>
                                <input type="text" class="form-control" id="complemento" name="complemento" placeholder="" value="{{$result->complemento}}" onkeyup="maiuscula(this)">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4 mobileform">
                            <div class="form-group">
                                <label for="naturalidade">Bairro</label>
                                <input type="text" class="form-control" id="bairro" name="bairro" placeholder="" value="{{$result->bairro}}" onkeyup="maiuscula(this)" required>
                            </div>
                        </div>
                        <div class="col-4 mobileform">
                            <div class="form-group">
                                <label for="naturalidade">Cidade</label>
                                <input type="text" class="form-control" id="cidade" name="cidade" placeholder="" value="{{$result->cidade}}" onkeyup="maiuscula(this)" required>
                            </div>
                        </div>

                        <div class="col-4 mobileform">
                            <div class="form-group">
                                <label for="nascimento">Estado</label>
                                <input type="text" class="form-control" id="estado" name="estado" value="{{$result->estado}}" onkeyup="maiuscula(this)" required>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-4 mobileform">
                            <div class="form-group">
                                <label for="nascimento">País</label>
                                <input type="text" class="form-control" id="pais" name="pais" value="{{$result->pais}}" onkeyup="maiuscula(this)" required>
                            </div>
                        </div>
                        <div class="col-4 mobileform">
                            <div class="form-group">
                                <label for="rg">Telefone Celular</label>
                                <input type="text" class="form-control phone_with_ddd" id="telefone" name="telefone" placeholder="" value="{{$result->telefone}}" required>
                            </div>
                        </div>
                        <div class="col-4 mobileform">
                            <div class="form-group">
                                <label for="dataemissao">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{$email}}" disabled>
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
                                <select class="form-control" id="formacao" name="formacao" required>
                                    <option value="">SELECIONE</option>
                                    <option value="ENGENHEIRO(A) CIVIL" {{$result->formacao == 'ENGENHEIRO(A) CIVIL' ? 'selected': ''}}>ENGENHEIRO(A) CIVIL</option>
                                    <option value="ARQUITETO(A) URBANISTA" {{$result->formacao == 'ARQUITETO(A) URBANISTA' ? 'selected': ''}}>ARQUITETO(A) URBANISTA</option>
                                    <option value="ENGENHEIRO(A) AGRIMENSOR" {{$result->formacao == 'ENGENHEIRO(A) AGRIMENSOR' ? 'selected': ''}}>ENGENHEIRO(A) AGRIMENSOR</option>
                                    <option value="ENGENHEIRO(A) AGRÔNOMO" {{$result->formacao == 'ENGENHEIRO(A) AGRÔNOMO' ? 'selected': ''}}>ENGENHEIRO(A) AGRÔNOMO</option>
                                    <option value="ENGENHEIRO(A) AGRÍCULA" {{$result->formacao == 'ENGENHEIRO(A) AGRÍCULA' ? 'selected': ''}}>ENGENHEIRO(A) AGRÍCULA</option>
                                    <option value="ENGENHEIRO(A) CARTÓGRAFO" {{$result->formacao == 'ENGENHEIRO(A) CARTÓGRAFO' ? 'selected': ''}}>ENGENHEIRO(A) CARTÓGRAFO</option>
                                    <option value="ENGENHEIRO(A) COMPUTAÇÃO" {{$result->formacao == 'ENGENHEIRO(A) COMPUTAÇÃO' ? 'selected': ''}}>ENGENHEIRO(A) COMPUTAÇÃO</option>
                                    <option value="ENGENHEIRO(A) ELETRECISTA" {{$result->formacao == 'ENGENHEIRO(A) ELETRECISTA' ? 'selected': ''}}>ENGENHEIRO(A) ELETRECISTA</option>
                                    <option value="ENGENHEIRO(A) MECÂNICO" {{$result->formacao == 'ENGENHEIRO(A) MECÂNICO' ? 'selected': ''}}>ENGENHEIRO(A) MECÂNICO</option>
                                    <option value="ENGENHEIRO(A) SANITARISTA" {{$result->formacao == 'ENGENHEIRO(A) SANITARISTA' ? 'selected': ''}}>ENGENHEIRO(A) SANITARISTA</option>
                                    <option value="ENGENHEIRO(A) SEGURANÇA DO TRABALHO" {{$result->formacao == 'ENGENHEIRO(A) SEGURANÇA DO TRABALHO' ? 'selected': ''}}>ENGENHEIRO(A) SEGURANÇA</option>
                                    <option value="ENGENHEIRO(A) TÊXTIL" {{$result->formacao == 'ENGENHEIRO(A) TÊXTIL' ? 'selected': ''}}>ENGENHEIRO(A) TÊXTIL</option>
                                    <option value="ENGENHEIRO(A) QUÍMICO" {{$result->formacao == 'ENGENHEIRO(A) QUÍMICO' ? 'selected': ''}}>ENGENHEIRO(A) QUÍMICO</option>
                                    <option value="ENGENHEIRO(A) PRODUÇÃO - MÊCANICA" {{$result->formacao == 'ENGENHEIRO(A) PRODUÇÃO - MÊCANICA' ? 'selected': ''}}>ENGENHEIRO(A) PRODUÇÃO - MÊCANICA</option>
                                    <option value="ENGENHEIRO(A) OPERAÇÃO - REFRIGERAÇÃO E AR CO" {{$result->formacao == 'ENGENHEIRO(A) OPERAÇÃO - REFRIGERAÇÃO E AR CO' ? 'selected': ''}}>ENGENHEIRO(A) OPERAÇÃO - REFRIGERAÇÃO E AR CO</option>
                                    <option value="ENGENHEIRO(A) INSDUSTRIAL - ELÉTRICA" {{$result->formacao == 'ENGENHEIRO(A) INSDUSTRIAL - ELÉTRICA' ? 'selected': ''}}>ENGENHEIRO(A) INSDUSTRIAL - ELÉTRICA</option>
                                    <option value="ENGENHEIRO(A) ELETRECISTA - ELETRÔNICA" {{$result->formacao == 'ENGENHEIRO(A) ELETRECISTA - ELETRÔNICA' ? 'selected': ''}}>ENGENHEIRO(A) ELETRECISTA - ELETRÔNICA</option>
                                    <option value="ENGENHEIRO(A) SANITARISTA E AMBIENTAL" {{$result->formacao == 'ENGENHEIRO(A) SANITARISTA E AMBIENTAL' ? 'selected': ''}}>ENGENHEIRO(A) SANITARISTA E AMBIENTAL</option>
                                    <option value="TECNÓLOGO(A) EDIFICAÇÕES" {{$result->formacao == 'TECNÓLOGO(A) EDIFICAÇÕES' ? 'selected': ''}}>TECNÓLOGO(A) EDIFICAÇÕES</option>
                                    <option value="EMPRESA OUTROS" {{$result->formacao == 'EMPRESA OUTROS' ? 'selected': ''}}>OUTROS</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6 mobileform">
                            <div class="form-group">
                                <label for="name">Número de Registro no CREA/CAU - <small>(Coloque conforme consta em registro profissional)</small></label>
                                <input type="name" class="form-control" id="crea" name="crea" placeholder="" value="{{$result->crea}}" onkeyup="maiuscula(this)">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@php
else:
@endphp
@php
if( $result->status_id == 1 ):
@endphp
<div class="row">
    <div class="col-lg-6">
        <div class="alert bg-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Atenção!</h5>
            Dados Pessoais Aprovados
        </div>
    </div>
</div>
@php
endif;
@endphp

@php
if( $result->status_id == 3 ):
@endphp
<div class="row">
    <div class="col-lg-6">
        <div class="alert bg-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-info"></i> Atenção!</h5>
            Dados Pessoais estão Em Análise
        </div>
    </div>


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
                        <div class="col-6 mobileform">
                            <div class="form-group">
                                <label for="name">Número de Registro no CREA/CAU - <small>(Coloque conforme consta em registro profissional)</small></label>
                                <p>{{$result->crea}}</p>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
@php
endif;
@endphp
@php
endif;
@endphp
@include('layouts.footer')
@stop
