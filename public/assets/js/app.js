// BIBLIOTECA SELECT2
$(window).on('load', function () {
    $('select').select2(); // Inicializa após o carregamento completo da página
});

// MENSAGEM DE ALERTA SOME APÓS 5 SEGUNDOS
setTimeout(() => {
    let p = document.getElementById("alert-result");
    p.style.opacity = "0";

    setTimeout(() => {
        p.style.display = "none";
    }, 3000);
}, 5000);


$(document).ready(function () {
    $('#ha_avaria').on('change', function () {
        const selecionar = $(this).val();

        if (selecionar === 'SIM') {
            $('#label_descricao_avaria').show();
            $('#label_foto_avaria').show();
        } else {
            $('#label_descricao_avaria').hide();
            $('#label_foto_avaria').hide();
            $('#avaria').val('');
            $('#foto_avaria').val('');
        }
    });


    // MENU LATERAL
    // AO CLICAR NO BOTÃO HAMBURGUER O MENU LATERAL SERÁ EXIBIDO, JUNTO COM O FUNDO ESCURO...
    var btnMenu = false;
    $("#btn-menu, #back-menu").click(function () {
        if (!btnMenu) {
            $(".menu-lateral").css({
                "left": "0",
                "transition": "left ease-in-out .2s"
            });

            $("#back-menu").fadeIn(200);
            $("#btn-menu").css({ "color": "#f1f1f1" });

            btnMenu = true;

            // AO CLICAR NO BOTÃO DE FECHAR OU NO FUNDO ESCURO ATRÁS DO MENU, O MENU LATERAL SRÁ FECHADO...
        } else {
            $(".menu-lateral, #btn-menu").removeAttr('style').css({ "transition": "left ease-in-out .2s" });
            $("#back-menu").fadeOut(200);
            btnMenu = false;
        }
    });

    $('.float-button-red').click(function () {
        $('.container-alert-confirmacao').fadeIn(100).css({ 'display': 'flex' })
    });
    $('.btn-cancelar-confirmacao').click(function () {
        $('.container-alert-confirmacao').fadeOut(100).css({ 'display': none });
    })

});