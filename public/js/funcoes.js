$(function () {
    $.get('verifica', function (data, status) {

        //1 - Aprovado (green)
        //2 - Reprovado (red)
        //3 - Análise (yellow)

        let obj = $.parseJSON(data);

        // Dados Pessoais

        if (obj.dados == 1) {
            $('.fa-user').addClass('text-green');
        }

        if (obj.dados == 2) {
            $('.fa-user').addClass('text-red');
        }

        if (obj.dados == 3) {
            $('.fa-user').addClass('text-yellow');
        }

        // Requerimento

        if (obj.requerimento == 1) {
            $('.fa-book').addClass('text-green');
        }

        if (obj.requerimento == 2) {
            $('.fa-book').addClass('text-red');
        }

        if (obj.requerimento == 3) {
            $('.fa-book').addClass('text-yellow');
        }

        // Declaração

        if (obj.declaracao == 1) {
            $('.fa-clone').addClass('text-green');
        }

        if (obj.declaracao == 2) {
            $('.fa-clone').addClass('text-red');
        }

        if (obj.declaracao == 3) {
            $('.fa-clone').addClass('text-yellow');
        }

        // diploma

        if (obj.diploma == 1) {
            $('.fa-university').addClass('text-green');
        }

        if (obj.diploma == 2) {
            $('.fa-university').addClass('text-red');
        }

        if (obj.diploma == 3) {
            $('.fa-university').addClass('text-yellow');
        }

        // solicitacao

        if (obj.solicitacao == 1) {
            $('.fa-wheelchair').addClass('text-green');
        }

        if (obj.solicitacao == 2) {
            $('.fa-wheelchair').addClass('text-red');
        }

        if (obj.solicitacao == 3) {
            $('.fa-wheelchair').addClass('text-yellow');
        }

        // comprovante

        if (obj.comprovante == 1) {
            $('.fa-barcode').addClass('text-green');
        }

        if (obj.comprovante == 2) {
            $('.fa-barcode').addClass('text-red');
        }

        if (obj.comprovante == 3) {
            $('.fa-barcode').addClass('text-yellow');
        }

    });
});