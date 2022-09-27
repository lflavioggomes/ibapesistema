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

        // $.get('verifica', function(data, status) {
        //     var obj = $.parseJSON(data);
        //     if (obj.valida == 0) {
        //        $("#modalconfirma").modal();
        //     }
        // });

         // candidato painel admin 

        $('#example1').DataTable({
            language: {
                lengthMenu: '_MENU_ quantidade por página',
                zeroRecords: 'Não encontrado',
                info: 'Mostrando _PAGE_ de _PAGES_',
                infoEmpty: 'Sem Registros',
                infoFiltered: '(filtrado de _MAX_ total de registros)',
                search:      'Procurar:',
                paginate: {
                            "first":      "Primeiro",
                            "last":       "Último",
                            "next":       "Próximo",
                            "previous":   "Anterior"
                        },
            },
        });
        
            $('#exampleModal').on('show.bs.modal', function(event) {
                let button = $(event.relatedTarget);
                var modal = $(this);
                let id = button.data('candidato');
                modal.find('.modalbody').html(' ');
                $.get("candidato/list", {
                        id: id
                    })
                    .done(function(data) {
                        modal.find('.modalbody').html(data);
                    })
                    .fail(function() {
                        modal.find('.modalbody').html('Nenhuma Informação preenchida.');
                    });
            })
            
        // Admin dados pessoais

        $(".statusmuda").click(function(){
            let statusmuda = $(this).attr('id');
            
            $("#modalstatustexto").html(statusmuda);

            if(statusmuda == 'reprovar')
            {
                $("#status_id_admin").val(2);
            }
            if(statusmuda == 'aprovar')
            {
                $("#status_id_admin").val(1);
            }
        });

        $("#enviaformstatusdado").click(function(){
           $("#formdadosadmin").submit();
        });

        //formação cadastro

        $("#nivel").change(function(){
            let nivel = $(this).find(':selected').data('ponto');

            if(nivel != undefined)
            {
                $(".pontoformacao").show("slow");
                $('#ponto').html(nivel);
                $('#previaponto').val(nivel);
            }else{
                $(".pontoformacao").hide("slow");
                $('#previaponto').val('');
            }
            
        });

});


function maiuscula(z) {
    v = z.value.toUpperCase();
    z.value = v;
}