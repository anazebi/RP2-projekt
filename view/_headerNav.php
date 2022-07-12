<!DOCTYPE html>
<html lang="hr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Špeceraj</title>
    <link rel = "stylesheet" href="css/master.css">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <script type = "text/javascript" src="javascript/usermode.js"></script>
    <script type="text/javascript" src="javascript/kosarica.js"></script>
  </head>
  <body>

    <?php
     ?>
    <ul class = "menu">
      <li id = "navigacija1"> <a href = "index.php?rt=index/index"> Ovotjedne akcije </a> </li>
      <li id = "navigacija2"> <a href = "index.php?rt=stores/index"> Pregled prodavaonica </a> </li>
      <li id = "navigacija3"> <a href = "index.php?rt=products/search"> Pronađi proizvod </a> </li>
      <li id = "navigacija4"> <a href = "index.php?rt=products/cart"> Pregled košarice </a> </li>
    </ul>

    <?php

    if(session_status() === PHP_SESSION_NONE)
    {
      session_start();
    }
    // prijavljenom korisniku dajemo mogućnost odjave
    if(isset($_SESSION['logged']))
    {
      if($_SESSION['logged'] === true)
      {
      ?>
        <div class = "buttons"><button type="button" id="signout"> Sign out </button></div>
        <br><br>
      <?php
      }
      // ostalim korisnicima mogucnost registracije ili prijave
      else
      {
      ?>
        <div class = "buttons">
          <button type="button" id="signin"> Sign in </button>
          <button type="button" id="register"> Register </button>
        </div>
      <?php
      }
    }
    else
    {
    ?>
    <div class = "buttons">
      <button type="button" id="signin"> Sign in </button>
      <button type="button" id="register"> Register </button>
    </div>
    <?php
    }
    ?>
