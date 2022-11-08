//const { Alert } = require("bootstrap");

$(function () {

let text = window.location.pathname;
const myArray = text.split("/");

var urlstring = '';
if(myArray[1] == 'ibapesistema')
{
    var urlstring =  '/ibapesistema/public/';
}else{
    var urlstring =  '/';
}

// Verifica se candidato finalizou

$.get( urlstring+"finaliza/verifica", function( data ) {
    if(data == 1)
    {
       $("#cadastroplus").attr("href", "#")
       // $("#cadastroplus").addClass("isDisabled");
       $("#browseFile").attr("disabled", true);
    }
 });



    $("#textototal").hide();

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

        $('#cpf').blur(function() {
            var exp = /\.|\-/g;
            
            var cpf = $('#cpf').val().replace(exp,'').toString();
            
            if(cpf.length == 11 ){
            
            var v = [];
        
            //Calcula o primeiro dígito de verificação.
            v[0] = 1 * cpf[0] + 2 * cpf[1] + 3 * cpf[2];
            v[0] += 4 * cpf[3] + 5 * cpf[4] + 6 * cpf[5];
            v[0] += 7 * cpf[6] + 8 * cpf[7] + 9 * cpf[8];
            v[0] = v[0] % 11;
            v[0] = v[0] % 10;
        
            //Calcula o segundo dígito de verificação.
            v[1] = 1 * cpf[1] + 2 * cpf[2] + 3 * cpf[3];
            v[1] += 4 * cpf[4] + 5 * cpf[5] + 6 * cpf[6];
            v[1] += 7 * cpf[7] + 8 * cpf[8] + 9 * v[0];
            v[1] = v[1] % 11;
            v[1] = v[1] % 10;
        
            //Retorna Verdadeiro se os dígitos de verificação são os esperados.
                    
            if ((v[0] != cpf[9]) || (v[1] != cpf[10]))
            {
                $("#alert").html('CPF inválido - ' + cpf);
                $("#modalalert").modal();
                $("#cpf").val('');
                return false;
            }
            
            else if (cpf[0] == cpf[1] && cpf[1] == cpf[2] && cpf[2] == cpf[3] && cpf[3] == cpf[4] && cpf[4] == cpf[5] && cpf[5] == cpf[6] && cpf[6] == cpf[7] && cpf[7] == cpf[8] && cpf[8] == cpf[9] && cpf[9] == cpf[10])
            {
                $("#alert").html('CPF inválido - ' + cpf);
                $("#modalalert").modal();
                $("#cpf").val('');
                return false;
            }        
             else
             {
               return true
             }       
            }else
             {
                $("#alert").html('CPF inválido - ' + cpf);
                $("#modalalert").modal();
                $("#cpf").val('');
                return false
            } 
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
                                $('#ponto').html(3);
                                $('#previaponto').val(3);
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
                let numeroreal = '';
                
                if(numero > 20)
                {
                     numeroreal = 20;
                }else{
                     numeroreal = numero;
                }
                
                let result = numero * 1920;
                $("#total_hora").val(result);
                $(".pontoformacao").show("slow");
                $('#ponto').html(numeroreal);
                $('#previaponto').val(numeroreal);
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

        $.get( urlstring+"formacao/ponto", function( data ) {
            $( "#formacaoacademica" ).find( "span" ).html(data);
         });

         $.get( urlstring+"divulgacao/ponto", function( data ) {
            $( "#materialtecnico" ).find( "span" ).html(data);
         });

         $.get( urlstring+"trabalho/ponto", function( data ) {
            $( "#trabalhopalestra" ).find( "span" ).html(data);
         });

         $.get( urlstring+"premiado/ponto", function( data ) {
            $( "#trabalhopremiado" ).find( "span" ).html(data);
         });

         $.get( urlstring+"docencia/ponto", function( data ) {
            $( "#exerciciodocencia" ).find( "span" ).html(data);
         });

         // capacidade tecnica

         $.get( urlstring+"atuacao/ponto", function( data ) {
            $( "#tempoatuacao" ).find( "span" ).html(data);
         });

         $.get( urlstring+"analise/ponto", function( data ) {
            $( "#analisecurricular" ).find( "span" ).html(data);
         });

         $.get( urlstring+"exercicio/ponto", function( data ) {
            $( "#exercicioregular" ).find( "span" ).html(data);
         });

         $.get( urlstring+"participacao/ponto", function( data ) {
            $( "#participacaocongresso" ).find( "span" ).html(data);
         });

         $.get( urlstring+"total/total", function( data ) {
            $( "#totalpontos" ).find( "span" ).html(data);
            if(data >= 70)
            {
                $("#textototal").show();
            }
         });

         $.get( urlstring+"total/totalcapacidade", function( data ) {
            $( "#totalpontosdois" ).find( "span" ).html(data);
            if(data >= 70)
            {
                $("#textototal").show();
            }
         });

         $("#finalizarprocesso").click(function(){

            $.get( urlstring+"finaliza/verifica", function( data ) {
                if(data == 1)
                {
                 $("#alert").html("Documentação já foi finalizada");
                 $("#modalalert").modal();
                }else{
                 $("#alertfinaliza").html('Deseja Finalizar o processo de certificação?');
                 $("#modalfinaliza").modal();
                }
            });


           
         });

         

         $("#cadastroplus").click(function(){
             $.get( urlstring+"finaliza/verifica", function( data ) {
                    if(data == 1)
                    {
                     $("#alert").html("Não é possível cadastrar após ter finalizado a documentação.");
                     $("#modalalert").modal();
                    }
                });
             });

});


function maiuscula(z) {
    v = z.value.toUpperCase();
    z.value = v;
}


    
            
    
        

