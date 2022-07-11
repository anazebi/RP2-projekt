// u slucaju pritiska na neki od buttona, preusmjerimo korisnika na zeljeni nacin

$(document).ready(function(){

  $("#signout").on("click", function(){
    window.location.href = "index.php?rt=login/logout";
  });

  $("#register").on("click", function(){
		window.location.href = "index.php?rt=login/register";
	});

  $("#signin").on("click", function(){
    window.location.href = "index.php?rt=login/index";
  });
});
