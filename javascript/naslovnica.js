// kreiramo naslovnu sliku za stranicu
var naslovnica = new Image();
naslovnica.src = 'naslovnica.jpg';

$(naslovnica).on("load", function()
{
      $("#canvas").attr("width", $(window).width());

      // dohvacanje 2d konteksta za crtanje
      let ctx = $("#canvas").get(0).getContext('2d');
      let cwidth = $("#canvas").width();
      let cheight = $("#canvas").height();

      ctx.drawImage(this, -100, 10, naslovnica.width, naslovnica.height, 0, 0, cwidth-120, cheight);

      ctx.font = "70px Arial";
      ctx.textAlign = "center";

      let slova = ctx.measureText("ONLINE ŠPECERAJ").width;
      ctx.fillText("ONLINE ŠPECERAJ", 340, 340);
});
