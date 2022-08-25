@extends('adminlte::page')
@section('content_header')

<h1>Dados Pessoais Candidato</h1>
@stop

@section('content')
@php
if( empty($result->status_id) || $result->status_id == 2 ):
@endphp
@php
if( $result->status_id == 2 ):
@endphp
<div class="row">
    <div class="col-lg-12">
        <div class="alert alert-warning alert-dismissible">
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
                        <div class="col-3">
                            <div class="form-group">
                                <label for="nacionalidade">Nacionalidade</label>
                                <input type="text" class="form-control" id="nacionalidade" name="nacionalidade" value="{{$result->nacionalidade}}" onkeyup="maiuscula(this)" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="naturalidade">Naturalidade</label>
                                <input type="text" class="form-control" id="naturalidade" name="naturalidade" placeholder="" value="{{$result->naturalidade}}" onkeyup="maiuscula(this)" required>
                            </div>
                        </div>
                        <div class="col-3">
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
                        <div class="col-3">
                            <div class="form-group">
                                <label for="nascimento">Nascimento</label>
                                <input type="text" class="form-control date" id="nascimento" name="nascimento" value="{{$result->nascimento == '' ? '': date('d-m-Y', strtotime($result->nascimento))}}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label for="rg">RG</label>
                                <input type="text" class="form-control" id="rg" name="rg" placeholder="" value="{{$result->rg}}" onkeyup="maiuscula(this)" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="emissor">Órgão Emissor / UF</label>
                                <input type="text" class="form-control" id="emissor" name="emissor" placeholder="" value="{{$result->emissor}}" onkeyup="maiuscula(this)" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="dataemissao">Data de Emissão</label>
                                <input type="text" class="form-control date" id="dataemissao" name="dataemissao" placeholder="" value="{{$result->dataemissao == '' ? '': date('d-m-Y', strtotime($result->dataemissao)) }}" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="cpf">CPF</label>
                                <input type="text" class="form-control cpf" id="cpf" name="cpf" placeholder="" value="{{$result->cpf}}" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-header" style="background-color: #007bff !important; color:#fff;">
                    <h3 class="card-title">Endereço Residencial</h3>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label for="cep">CEP</label>
                                <input type="text" class="form-control cep" id="cep" name="cep" placeholder="" value="{{$result->cep}}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="name">Logradouro</label>
                                <input type="name" class="form-control" id="endereco" name="endereco" placeholder="" value="{{$result->endereco}}" onkeyup="maiuscula(this)" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="nacionalidade">Número</label>
                                <input type="text" class="form-control" id="numero" name="numero" placeholder="" value="{{$result->numero}}" onkeyup="maiuscula(this)" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="nacionalidade">Complemento</label>
                                <input type="text" class="form-control" id="complemento" name="complemento" placeholder="" value="{{$result->complemento}}" onkeyup="maiuscula(this)">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label for="naturalidade">Bairro</label>
                                <input type="text" class="form-control" id="bairro" name="bairro" placeholder="" value="{{$result->bairro}}" onkeyup="maiuscula(this)" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="naturalidade">Cidade</label>
                                <input type="text" class="form-control" id="cidade" name="cidade" placeholder="" value="{{$result->cidade}}" onkeyup="maiuscula(this)" required>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label for="nascimento">Estado</label>
                                <input type="text" class="form-control" id="estado" name="estado" value="{{$result->estado}}" onkeyup="maiuscula(this)" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="nascimento">País</label>
                                <input type="text" class="form-control" id="pais" name="pais" value="{{$result->pais}}" onkeyup="maiuscula(this)" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="rg">Telefone Celular</label>
                                <input type="text" class="form-control phone_with_ddd" id="telefone" name="telefone" placeholder="" value="{{$result->telefone}}" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="emissor">Fax</label>
                                <input type="text" class="form-control" id="fax" name="fax" placeholder="" value="{{$result->fax}}">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="dataemissao">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{$email}}" disabled>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-header" style="background-color: #007bff !important; color:#fff;" required>
                    <h3 class="card-title">Formação Profissional</h3>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="sexo">Profissão</label>
                                <select class="form-control" id="formacao" name="formacao" required>
                                    <option value="">SELECIONE</option>
                                    <option value="ENGENHEIRO CIVIL" {{$result->formacao == 'ENGENHEIRO CIVIL' ? 'selected': ''}}>ENGENHEIRO CIVIL</option>
                                    <option value="ARQUITETO URBANISTA" {{$result->formacao == 'ARQUITETO URBANISTA' ? 'selected': ''}}>ARQUITETO URBANISTA</option>
                                    <option value="ENGENHEIRO AGRIMENSOR" {{$result->formacao == 'ENGENHEIRO AGRIMENSOR' ? 'selected': ''}}>ENGENHEIRO AGRIMENSOR</option>
                                    <option value="ENGENHEIRO AGRÔNOMO" {{$result->formacao == 'ENGENHEIRO AGRÔNOMO' ? 'selected': ''}}>ENGENHEIRO AGRÔNOMO</option>
                                    <option value="ENGENHEIRO AGRÍCULA" {{$result->formacao == 'ENGENHEIRO AGRÍCULA' ? 'selected': ''}}>ENGENHEIRENGENHEIRO AGRÍCULA</option>
                                    <option value="ENGENHEIRO CARTÓGRAFO" {{$result->formacao == 'ENGENHEIRO CARTÓGRAFO' ? 'selected': ''}}>ENGENHEIRO CARTÓGRAFO</option>
                                    <option value="ENGENHEIRO COMPUTAÇÃO" {{$result->formacao == 'ENGENHEIRO COMPUTAÇÃO' ? 'selected': ''}}>ENGENHEIRO COMPUTAÇÃO</option>
                                    <option value="ENGENHEIRO ELETRECISTA" {{$result->formacao == 'ENGENHEIRO ELETRECISTA' ? 'selected': ''}}>ENGENHEIRO ELETRECISTA</option>
                                    <option value="ENGENHEIRO MECÂNICO" {{$result->formacao == 'ENGENHEIRO MECÂNICO' ? 'selected': ''}}>ENGENHEIRO MECÂNICO</option>
                                    <option value="ENGENHEIRO SANITARISTA" {{$result->formacao == 'ENGENHEIRO SANITARISTA' ? 'selected': ''}}>ENGENHEIRO SANITARISTA</option>
                                    <option value="ENGENHEIRO SEGURANÇA DO TRABALHO" {{$result->formacao == 'ENGENHEIRO SEGURANÇA DO TRABALHO' ? 'selected': ''}}>Engenheiro SEGURANÇA</option>
                                    <option value="ENGENHEIRO TÊXTIL" {{$result->formacao == 'ENGENHEIRO TÊXTIL' ? 'selected': ''}}>ENGENHEIRO TÊXTIL</option>
                                    <option value="ENGENHEIRO PRODUÇÃO - MÊCANICA" {{$result->formacao == 'ENGENHEIRO PRODUÇÃO - MÊCANICA' ? 'selected': ''}}>ENGENHEIRO PRODUÇÃO - MÊCANICA</option>
                                    <option value="ENGENHEIRO OPERAÇÃO - REFRIGERAÇÃO E AR CO" {{$result->formacao == 'ENGENHEIRO OPERAÇÃO - REFRIGERAÇÃO E AR CO' ? 'selected': ''}}>ENGENHEIRO OPERAÇÃO - REFRIGERAÇÃO E AR CO</option>
                                    <option value="ENGENHEIRO INSDUSTRIAL - ELÉTRICA" {{$result->formacao == 'ENGENHEIRO INSDUSTRIAL - ELÉTRICA' ? 'selected': ''}}>ENGENHEIRO INSDUSTRIAL - ELÉTRICA</option>
                                    <option value="ENGENHEIRO ELETRECISTA - ELETRÔNICA" {{$result->formacao == 'ENGENHEIRO ELETRECISTA - ELETRÔNICA' ? 'selected': ''}}>ENGENHEIRO ELETRECISTA - ELETRÔNICA</option>
                                    <option value="ENGENHEIRO SANITARISTA E AMBIENTAL" {{$result->formacao == 'ENGENHEIRO SANITARISTA E AMBIENTAL' ? 'selected': ''}}>ENGENHEIRO SANITARISTA E AMBIENTAL</option>
                                    <option value="TECNÓLOGO EDIFICAÇÕES" {{$result->formacao == 'TECNÓLOGO EDIFICAÇÕES' ? 'selected': ''}}>TECNÓLOGO EDIFICAÇÕES</option>
                                    <option value="EMPRESA OUTROS" {{$result->formacao == 'EMPRESA OUTROS' ? 'selected': ''}}>EMPRESA OUTROS</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="name">CREA/CAU - <small>Coloque conforme consta em registro profissional</small></label>
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
    <div class="col-lg-12">
        <div class="alert alert-success alert-dismissible">
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
    <div class="col-lg-12">
        <div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-info"></i> Atenção!</h5>
            Dados Pessoais estão Em Análise
        </div>
    </div>
</div>
@php
endif;
@endphp
@php
endif;
@endphp
@stop
@section('css')
<!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
@stop

@section('js')
<script type="text/javascript" src="{{asset('js/jquery.mask.js')}}"></script>

<script type="text/javascript">
    $(function() {
        $('.date').mask('00-00-0000', {
            placeholder: "__-__-____"
        });
        $('.cep').mask('00000-000', {
            placeholder: "_____-___"
        });
        $('.cpf').mask('000.000.000-00', {
            placeholder: "___.___.___-__"
        });
        $('.phone_with_ddd').mask('(00) 00000-0000');

        $('input#cep').blur(function() {
            $.get('buscacep?cep=' + $(this).val(), function(data, status) {
                var obj = $.parseJSON(data);
                if (obj.resultado == 1) {
                    $('#endereco').val(obj.tipo_logradouro.toUpperCase() + ' ' + obj.logradouro.toUpperCase());
                    $('#bairro').val(obj.bairro.toUpperCase());
                    $('#cidade').val(obj.cidade.toUpperCase());
                    $('#estado').val(obj.uf.toUpperCase());
                    $('#numero').focus();
                } else {
                    $('#endereco').val('');
                    $('#bairro').val('');
                    $('#cidade').val('');
                    $('#estado').val('');
                    $('#endereco').focus();
                }
            });
        });
    });

    function maiuscula(z) {
        v = z.value.toUpperCase();
        z.value = v;
    }
</script>
@stop