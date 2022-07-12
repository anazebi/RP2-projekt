// javascript kod koji kontrolira boje navigacijskog izbornika

$(document).ready(function(){

  // svim navigacijskim karticama na pomak miša preko njih mijenjamo boju
  $("li#navigacija1").on("mouseenter", function(){
    $("li#navigacija1").css("background-color", "#3498db");
  });

  $("li#navigacija2").on("mouseenter", function(){
    $("li#navigacija2").css("background-color", "#9b59b6");
  });

  $("li#navigacija3").on("mouseenter", function(){
    $("li#navigacija3").css("background-color", "#e67e22");
  });

  $("li#navigacija4").on("mouseenter", function(){
    $("li#navigacija4").css("background-color", "#16a085");
  });

  // nakon sto mis napusti prostor kartice vracamo njenu boju na defaultnu
  $("li#navigacija1").on("mouseleave", function(){
    $("li#navigacija1").css("background-color", "#2c3e50");
  });

  $("li#navigacija2").on("mouseleave", function(){
    $("li#navigacija2").css("background-color", "#2c3e50");
  });

  $("li#navigacija3").on("mouseleave", function(){
    $("li#navigacija3").css("background-color", "#2c3e50");
  });

  $("li#navigacija4").on("mouseleave", function(){
    $("li#navigacija4").css("background-color", "#2c3e50");
  });
});
