@extends('adminlte::page')
@section('content_header')

<h1>Dados Pessoais Candidato</h1>
@stop

@section('content')
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
                        <input type="name" class="form-control" id="name" name="name" placeholder="" value="{{$name}}" onkeyup="maiuscula(this)" >
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label for="nacionalidade">Nacionalidade</label>
                                <input type="text" class="form-control" id="nacionalidade" name="nacionalidade" value="{{$result->nacionalidade}}" onkeyup="maiuscula(this)" >
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="naturalidade">Naturalidade</label>
                                <input type="text" class="form-control" id="naturalidade" name="naturalidade" placeholder="" value="{{$result->naturalidade}}" onkeyup="maiuscula(this)" >
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="sexo">sexo</label>
                                <select class="form-control" id="sexo" name="sexo">
                                    <option value="">SELECIONE</option>
                                    <option value="MASCULINO" {{$result->sexo == 'MASCULINO' ? 'selected': ''}}>MASCULINO</option>
                                    <option value="FEMININO" {{$result->sexo == 'FEMININO' ? 'selected': ''}}>FEMININO</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="nascimento">Nascimento</label>
                                <input type="text" class="form-control date" id="nascimento" name="nascimento" value="{{$result->nascimento == '' ? '': date('d-m-Y', strtotime($result->nascimento))}}" >
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label for="rg">RG</label>
                                <input type="text" class="form-control" id="rg" name="rg" placeholder="" value="{{$result->rg}}" onkeyup="maiuscula(this)" >
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="emissor">Órgão Emissor / UF</label>
                                <input type="text" class="form-control" id="emissor" name="emissor" placeholder="" value="{{$result->emissor}}" onkeyup="maiuscula(this)" >
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="dataemissao">Data de Emissão</label>
                                <input type="text" class="form-control date" id="dataemissao" name="dataemissao" placeholder="" value="{{$result->dataemissao == '' ? '': date('d-m-Y', strtotime($result->dataemissao)) }}">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="cpf">CPF</label>
                                <input type="text" class="form-control cpf" id="cpf" name="cpf" placeholder="" value="{{$result->cpf}}">
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="exampleInputPassword1">Nome do Pai</label>
                        <input type="text" class="form-control" id="pai" name="pai" placeholder="" value="{{$result->pai}}" onkeyup="maiuscula(this)" >
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Nome da Mãe</label>
                        <input type="text" class="form-control" id="mae" name="mae" placeholder="" value="{{$result->mae}}" onkeyup="maiuscula(this)" >
                    </div>
                </div>

                <div class="card-header" style="background-color: #007bff !important; color:#fff;">
                    <h3 class="card-title">Endereço Residencial</h3>
                </div>

                <div class="card-body">
                    <div class="row">
                    <div class="col-3">
                            <div class="form-group">
                                <label for="sexo">CEP</label>
                                <input type="text" class="form-control cep" id="cep" name="cep" placeholder="" value="{{$result->cep}}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-8">
                            <div class="form-group">
                                <label for="name">Logradouro</label>
                                <input type="name" class="form-control" id="endereco" name="endereco" placeholder="" value="{{$result->endereco}}" onkeyup="maiuscula(this)" >
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="nacionalidade">Número</label>
                                <input type="text" class="form-control" id="numero" name="numero" placeholder="" value="{{$result->numero}}" onkeyup="maiuscula(this)" >
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label for="naturalidade">Bairro</label>
                                <input type="text" class="form-control" id="bairro" name="bairro" placeholder="" value="{{$result->bairro}}" onkeyup="maiuscula(this)" >
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="naturalidade">Cidade</label>
                                <input type="text" class="form-control" id="cidade" name="cidade" placeholder="" value="{{$result->cidade}}" onkeyup="maiuscula(this)" >
                            </div>
                        </div>
                       
                        <div class="col-3">
                            <div class="form-group">
                                <label for="nascimento">Estado</label>
                                <input type="text" class="form-control" id="estado" name="estado" value="{{$result->estado}}" onkeyup="maiuscula(this)" >
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="nascimento">País</label>
                                <input type="text" class="form-control" id="pais" name="pais" value="{{$result->pais}}" onkeyup="maiuscula(this)" >
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="rg">Telefone</label>
                                <input type="text" class="form-control phone_with_ddd" id="telefone" name="telefone" placeholder="" value="{{$result->telefone}}">
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
                    <div class="form-group">
                        <label for="exampleInputPassword1">Home Page</label>
                        <input type="text" class="form-control" id="homepage" name="homepage" placeholder="" value="{{$result->homepage}}">
                    </div>
                </div>

                <div class="card-header" style="background-color: #007bff !important; color:#fff;">
                    <h3 class="card-title">Formação Profissional</h3>
                </div>

                <div class="card-body">
                    <div class="row">
                    <div class="col-4">
                            <div class="form-group">
                                <label for="sexo">Profissão</label>
                                <input type="text" class="form-control" id="formacao" name="formacao" placeholder="" value="{{$result->formacao}}" onkeyup="maiuscula(this)">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="name">CREA/CAU</label>
                                <input type="name" class="form-control" id="crea" name="crea" placeholder="" value="{{$result->crea}}" onkeyup="maiuscula(this)" >
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
@stop
@section('css')
<!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
@stop

@section('js')
<script type="text/javascript" src="{{asset('js/jquery.mask.js')}}"></script>

<script type="text/javascript">
    $(function() {
        $('.date').mask('00-00-0000',{placeholder: "__-__-____"});
        $('.cep').mask('00000-000',{placeholder: "_____-___"});
        $('.cpf').mask('000.000.000-00',{placeholder: "___.___.___-__"});
        $('.phone_with_ddd').mask('(00) 00000-0000');
        console.log('hi');
    });

    function maiuscula(z){
        v = z.value.toUpperCase();
        z.value = v;
    }
</script>
@stop