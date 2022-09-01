<footer class="main-footer">
    <strong>Copyright © <script>
            document.write(new Date().getFullYear())
        </script> IBAPE NACIONAL - Certificação Profissional em Engenharia de Avaliações IBAPE.</strong>

    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.7.1
    </div>
</footer>

@section('css')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@stop

@section('js')
<script type="text/javascript" src="{{asset('js/jquery.mask.js')}}"></script>
<script type="text/javascript" src="{{asset('js/funcoes.js')}}"></script>

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