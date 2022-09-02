$(function () {

        // Trecho de código para dados pessoais

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

        //Trecho de código para solicitação justificada

        $("#solicitar").click(function(){
            $("#solicitacao").val(1);
            $("#necessidade").show('slow');
            $("#enviar").show('slow');
            $("#naoaplica").css("background","#4444");
            $("#solicitar").css("background","#218838");
            $("#campo").val('');
        });

        $("#naoaplica").click(function(){
            $("#solicitacao").val(0);
            $("#necessidade").hide('slow');
            $("#enviar").show('slow');
            $("#naoaplica").css("background","#dc3545");
            $("#solicitar").css("background","#4444");
            $("#campo").val('');
        }); 

        $("#enviar").click(function(){
            let necessidade = $("#campo").val();
            let solicitacao = $("#solicitacao").val();
            if( solicitacao == 0)
            {
                $("#enviasolicitacao").submit();
            }else{
                if(necessidade == '')
                {
                    alert('Descreva a necessidade');
                }else{
                    $("#enviasolicitacao").submit();
                }
            }
           
        })

    function maiuscula(z) {
        v = z.value.toUpperCase();
        z.value = v;
    }
});