// kreiramo naslovnu sliku za stranicu

var lokacija = ('naslovnica.jpg');
var naslovnica = new Image();
naslovnica.src = lokacija;

$(naslovnica).on("load", function()
{
    $("#canvas").attr("width", $(window).width() + 50);

    // dohvacanje 2d konteksta za crtanje
    let ctx = $("#canvas").get(0).getContext('2d');
    let cwidth = $("#canvas").width();
    let cheight = $("#canvas").height();

    ctx.drawImage(naslovnica, 10, 10, naslovnica.width, naslovnica.height, 0, 0, cwidth, cheight);

    ctx.font = "100px Arial"
    ctx.textAlign = "center";

    let slova = ctx.measureText("ONLINE ŠPECERAJ").width;
    ctx.fillText("ONLINE ŠPECERAJ", cwidth/2 - slova/2, 125);

});
