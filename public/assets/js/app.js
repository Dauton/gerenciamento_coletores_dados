$(document).ready(function () {

    // BIBLIOTECA Select2
    $(window).on('load', function () {
        $('.select2').select2();
    });

    // BIBLIOTECA DataTables
    $('.DataTable').DataTable({
        language: {
            url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json",
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

// MENSAGEM DE ALERTA SOME APÓS 5 SEGUNDOS
setTimeout(() => {
    let p = document.getElementById("alert-result");
    p.style.opacity = "0";

    setTimeout(() => {
        p.style.display = "none";
    }, 3000);
}, 5000);

/*

document.getElementById("loginAmazon").addEventListener("input", convert);

function convert() {
    var loginAmazon = document.getElementById("loginAmazon").value;

    if (!loginAmazon || Number(loginAmazon) < 0) {
        document.getElementById("result").innerHTML = "000,00000000000000000000000";
        return;
    }

    var abatrackHexa = Number(loginAmazon).toString(16);
    if (abatrackHexa.length == 5) {
        abatrackHexa = "0" + abatrackHexa;
    }
    var abaLength = abatrackHexa.length;
    var abatrackLast4 = abatrackHexa.substring(abaLength - 4);
    var abatrackRest = abatrackHexa.substring(abaLength - 6, abaLength - 4);
    var numberOfZeros = 0;
    for (var i = 0; i < abatrackLast4.length; i++) {
        if (abatrackLast4.charAt(i) == '0') {
            numberOfZeros++;
        } else {
            break;
        }
    }
    var wiegandEnd = parseInt(abatrackLast4, 16);
    if (wiegandEnd.toString().length < 5 && numberOfZeros == 0) {
        numberOfZeros += 5 - wiegandEnd.toString().length;
    }
    var wiegandBegin = parseInt(abatrackRest, 16);
    var wiegandEndZeros = "";
    for (var i = 0; i < numberOfZeros; i++) {
        wiegandEndZeros += "0";
    }
    var wiegandString = wiegandBegin.toString().padStart(3, '0') + "," + wiegandEndZeros + wiegandEnd.toString().padStart(5, '0');
    var serialID = parseInt(wiegandString.replace(",", ""));
    document.getElementById("result").innerHTML = wiegandString;

    // Convertendo Wiegand para Hexadecimal
    var facilityCode = wiegandString.slice(0, 3); // Primeiros 3 dígitos
    var digitsAfterComma = wiegandString.slice(4); // Dígitos após a vírgula

    var facilityCodeHex = parseInt(facilityCode).toString(16).toUpperCase();
    var digitsAfterCommaHex = parseInt(digitsAfterComma).toString(16).toUpperCase();

    var hexaString = facilityCodeHex.padStart(4, '0') + digitsAfterCommaHex.padStart(4, '0');
    document.getElementById("result").innerHTML + hexaString;

    // Convertendo Hexadecimal para Decimal
    var decimalString = parseInt(hexaString, 16);
    document.getElementById("result").innerHTML += decimalString.toString().padStart(10, '0');
} 
    
*/