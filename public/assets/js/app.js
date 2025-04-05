
setTimeout(() => {
    let p = document.getElementById("alert-result");
    p.style.opacity = "0";
    
    setTimeout(() => {
        p.style.display = "none";
    }, 3000);
}, 5000);

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