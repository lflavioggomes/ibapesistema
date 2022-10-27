$(function () {

     $('.select2').select2({
        placeholder: 'Selecione os Candidatos'
     });

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

        // trabalho e palestras

        $(".trabalho").change(function(){
            let evento = $("#eventotrabalho").find(':selected').val();
            let entidade = $("#entidadetrabalho").find(':selected').val();

            
            if(evento != '' && entidade != '')
            {
                if( entidade  == 'IBAPE/UPAV')
                {
                    switch (evento) {
                        case 'Congresso':
                                $(".pontoformacao").show("slow");
                                $('#ponto').html(3);
                                $('#previaponto').val(3);
                            break;

                            case 'Seminário':
                                $(".pontoformacao").show("slow");
                                $('#ponto').html(2);
                                $('#previaponto').val(2);
                            break;

                            case 'Simpósio':
                                $(".pontoformacao").show("slow");
                                $('#ponto').html(1);
                                $('#previaponto').val(1);
                            break;

                            case 'Outros':
                                $(".pontoformacao").show("slow");
                                $('#ponto').html(1);
                                $('#previaponto').val(1);
                            break;
                    
                        default:
                                $(".pontoformacao").hide("slow");
                                $('#previaponto').val('');
                            break;
                    }
                }

                if( entidade  == 'Outros')
                {
                    switch (evento) {
                        case 'Congresso':
                                $(".pontoformacao").show("slow");
                                $('#ponto').html(2);
                                $('#previaponto').val(2);
                            break;

                            case 'Seminário':
                                $(".pontoformacao").show("slow");
                                $('#ponto').html(1);
                                $('#previaponto').val(1);
                            break;

                            case 'Simpósio':
                                $(".pontoformacao").show("slow");
                                $('#ponto').html(1);
                                $('#previaponto').val(1);
                            break;

                            case 'Outros':
                                $(".pontoformacao").show("slow");
                                $('#ponto').html(1);
                                $('#previaponto').val(1);
                            break;
                    
                        default:
                                $(".pontoformacao").hide("slow");
                                $('#previaponto').val('');
                            break;
                    }
                }
               
            }else{
                $(".pontoformacao").hide("slow");
                $('#previaponto').val('');
            }
            
        });


         // Trabalhos Premiados em Congressos e correlatos

         $(".trabalhopremiado").change(function(){
            let evento = $("#eventopremiado").find(':selected').val();
            let entidade = $("#entidadepremiado").find(':selected').val();

            
            if(evento != '' && entidade != '')
            {
                if( entidade  == 'IBAPE/UPAV')
                {
                    switch (evento) {
                        case 'Congresso':
                                $(".pontoformacao").show("slow");
                                $('#ponto').html(8);
                                $('#previaponto').val(8);
                            break;

                            case 'Seminário':
                                $(".pontoformacao").show("slow");
                                $('#ponto').html(3);
                                $('#previaponto').val(3);
                            break;

                            case 'Simpósio':
                                $(".pontoformacao").show("slow");
                                $('#ponto').html(2);
                                $('#previaponto').val(2);
                            break;

                            case 'Outros':
                                $(".pontoformacao").show("slow");
                                $('#ponto').html(1);
                                $('#previaponto').val(1);
                            break;
                    
                        default:
                                $(".pontoformacao").hide("slow");
                                $('#previaponto').val('');
                            break;
                    }
                }

                if( entidade  == 'Outros')
                {
                    switch (evento) {
                        case 'Congresso':
                                $(".pontoformacao").show("slow");
                                $('#ponto').html(3);
                                $('#previaponto').val(3);
                            break;

                            case 'Seminário':
                                $(".pontoformacao").show("slow");
                                $('#ponto').html(2);
                                $('#previaponto').val(2);
                            break;

                            case 'Simpósio':
                                $(".pontoformacao").show("slow");
                                $('#ponto').html(1);
                                $('#previaponto').val(1);
                            break;

                            case 'Outros':
                                $(".pontoformacao").show("slow");
                                $('#ponto').html(1);
                                $('#previaponto').val(1);
                            break;
                    
                        default:
                                $(".pontoformacao").hide("slow");
                                $('#previaponto').val('');
                            break;
                    }
                }
               
            }else{
                $(".pontoformacao").hide("slow");
                $('#previaponto').val('');
            }
            
        });


         // Exercício da Docência

         $(".trabalhoexercicio").change(function(){
            let evento = $("#exercicionivel").find(':selected').val();
            let entidade = $("#exercicioinstituicao").find(':selected').val();

            
            if(evento != '' && entidade != '')
            {
                if( entidade  == 'IBAPE/UPAV')
                {
                    switch (evento) {
                        case 'Curta Duração - Eng. Aval.':
                                $(".pontoformacao").show("slow");
                                $('#ponto').html(3);
                                $('#previaponto').val(3);
                            break;

                            case 'Docência em Área Afins':
                                $(".pontoformacao").show("slow");
                                $('#ponto').html(2);
                                $('#previaponto').val(2);
                            break;

                            case 'Especialização - Eng. Aval.':
                                $(".pontoformacao").show("slow");
                                $('#ponto').html(3);
                                $('#previaponto').val(3);
                            break;

                            case 'Mestrado / Doutourado - Eng. Aval.':
                                $(".pontoformacao").show("slow");
                                $('#ponto').html(4);
                                $('#previaponto').val(4);
                            break;
                    
                        default:
                                $(".pontoformacao").hide("slow");
                                $('#previaponto').val('');
                            break;
                    }
                }

                if( entidade  == 'Outros')
                {
                    switch (evento) {
                        case 'Curta Duração - Eng. Aval.':
                                $(".pontoformacao").show("slow");
                                $('#ponto').html(2);
                                $('#previaponto').val(2);
                            break;

                            case 'Docência em Área Afins':
                                $(".pontoformacao").show("slow");
                                $('#ponto').html(1);
                                $('#previaponto').val(1);
                            break;

                            case 'Especialização - Eng. Aval.':
                                $(".pontoformacao").show("slow");
                                $('#ponto').html(2);
                                $('#previaponto').val(2);
                            break;

                            case 'Mestrado / Doutourado - Eng. Aval.':
                                $(".pontoformacao").show("slow");
                                $('#ponto').html(3);
                                $('#previaponto').val(3);
                            break;
                    
                        default:
                                $(".pontoformacao").hide("slow");
                                $('#previaponto').val('');
                            break;
                    }
                }
               
            }else{
                $(".pontoformacao").hide("slow");
                $('#previaponto').val('');
            }
            
        });

        // Participação em Congressos e Correlatos

        $(".trabalhoparticipacao").change(function(){
            let evento = $("#eventoparticipacao").find(':selected').val();
            let entidade = $("#entidadeparticipacao").find(':selected').val();

            
            if(evento != '' && entidade != '')
            {
                if( entidade  == 'IBAPE/UPAV')
                {
                    switch (evento) {
                        case 'Congresso':
                                $(".pontoformacao").show("slow");
                                $('#ponto').html(5);
                                $('#previaponto').val(5);
                            break;

                            case 'Seminário':
                                $(".pontoformacao").show("slow");
                                $('#ponto').html(4);
                                $('#previaponto').val(4);
                            break;

                            case 'Cursos':
                                $(".pontoformacao").show("slow");
                                $('#ponto').html(4);
                                $('#previaponto').val(4);
                            break;

                            case 'Outros':
                                $(".pontoformacao").show("slow");
                                $('#ponto').html(3);
                                $('#previaponto').val(3);
                            break;
                    
                        default:
                                $(".pontoformacao").hide("slow");
                                $('#previaponto').val('');
                            break;
                    }
                }

                if( entidade  == 'Outros')
                {
                    switch (evento) {
                        case 'Congresso':
                                $(".pontoformacao").show("slow");
                                $('#ponto').html(4);
                                $('#previaponto').val(4);
                            break;

                            case 'Seminário':
                                $(".pontoformacao").show("slow");
                                $('#ponto').html(3);
                                $('#previaponto').val(3);
                            break;

                            case 'Cursos':
                                $(".pontoformacao").show("slow");
                                $('#ponto').html(2);
                                $('#previaponto').val(2);
                            break;

                            case 'Outros':
                                $(".pontoformacao").show("slow");
                                $('#ponto').html(2);
                                $('#previaponto').val(2);
                            break;
                    
                        default:
                                $(".pontoformacao").hide("slow");
                                $('#previaponto').val('');
                            break;
                    }
                }
               
            }else{
                $(".pontoformacao").hide("slow");
                $('#previaponto').val('');
            }
            
        });

      // trecho de código cadastro Tempo de Atuação Profissional no Âmbito da Certificação

        $('input#numero_ano').blur(function() {

            let numero = $("#numero_ano").val();

            if( numero > 50 )
            {
                $(".pontoformacao").hide("slow");
                $('#previaponto').val('');
                $("#total_hora").val('');
                $("#alert").html("Número de anos não pode ser maior que 50");
                $("#modalalert").modal();

            }else if ( numero == 0 ){
                $("#alert").html("Número de anos não pode ser 0");
                $("#modalalert").modal();
                $("#total_hora").val('');
            }
            else{
                let result = numero * 1920;
                $("#total_hora").val(result);
                $(".pontoformacao").show("slow");
                $('#ponto').html(numero);
                $('#previaponto').val(numero);
            }
        });

        $('.numero').keyup(function() {
            $(this).val(this.value.replace(/\D/g, ''));
          });

     // trecho de código cadastro Análise Curricular no âmbito da Certificação
     
     $('input#previapontoanalise').blur(function() {

        let numero = $("#previapontoanalise").val();

        if( numero > 30 )
        {
            $(".pontoformacao").hide("slow");
            $('#previapontoanalise').val('');
            $("#alert").html("Número de anos não pode ser maior que 30");
            $("#modalalert").modal();

        }else if ( numero == 0 ){
            $("#alert").html("Número de anos não pode ser 0");
            $("#modalalert").modal();
            $("#total_hora").val('');
        }
        else{
            let result = numero * 1920;
            $(".pontoformacao").show("slow");
            $('#ponto').html(numero);
        }
    });

        // formação academica

        $.get( "formacao/ponto", function( data ) {
            $( "#formacaoacademica" ).find( "span" ).html(data);
         });

         $.get( "divulgacao/ponto", function( data ) {
            $( "#materialtecnico" ).find( "span" ).html(data);
         });

         $.get( "trabalho/ponto", function( data ) {
            $( "#trabalhopalestra" ).find( "span" ).html(data);
         });

         $.get( "premiado/ponto", function( data ) {
            $( "#trabalhopremiado" ).find( "span" ).html(data);
         });

         $.get( "docencia/ponto", function( data ) {
            $( "#exerciciodocencia" ).find( "span" ).html(data);
         });

         // capacidade tecnica

         $.get( "atuacao/ponto", function( data ) {
            $( "#tempoatuacao" ).find( "span" ).html(data);
         });

         $.get( "analise/ponto", function( data ) {
            $( "#analisecurricular" ).find( "span" ).html(data);
         });

         $.get( "exercicio/ponto", function( data ) {
            $( "#exercicioregular" ).find( "span" ).html(data);
         });

         $.get( "participacao/ponto", function( data ) {
            $( "#participacaocongresso" ).find( "span" ).html(data);
         });

});


function maiuscula(z) {
    v = z.value.toUpperCase();
    z.value = v;
}