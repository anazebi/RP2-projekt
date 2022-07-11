<!DOCTYPE html>
<html lang="hr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Špeceraj</title>
    <link rel = "stylesheet" href="css/master.css">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <script type = "text/javascript" src="javascript/naslovnica.js"></script>
    <script type = "text/javascript" src="javascript/usermode.js"></script>
    <script type="text/javascript" src="javascript/kosarica.js"></script>
  </head>
  <body>

    <?php
    // koristimo javascript canvas da bismo po slici postavljenoj u zaglavlju ispisali ime nase stranice
     ?>
    <canvas id="canvas" width="$(window).width()" height="350" style="position:relative; top:0; left:0;"></canvas>
    <nav id = "navigacija">
      <ul>
        <li> <a href = "index.php?rt=index/index"> Ovotjedne akcije </a> </li>
        <li> <a href = "index.php?rt=stores/index"> Pregled prodavaonica </a> </li>
        <li> <a href = "index.php?rt=products/search"> Pronađi proizvod </a> </li>
        <li> <a href = "index.php?rt=products/cart"> Pregled košarice </a> </li>
      </ul>
    </nav>

    <?php

    if(session_status() === PHP_SESSION_NONE)
    {
      session_start();
    }

    if(isset($_SESSION['login']))
    {
      if($_SESSION['login'] === true)
      {
      ?>
        <button type="button" id="signout"> Sign out </button>
        <br><br>
      <?php
      }
      else
      {
      ?>
        <button type="button" id="signin"> Sign in </button>
        <br><br>
        <button type="button" id="register"> Register </button>
      <?php
      }
    }
    else
    {
    ?>
      <button type="button" id="signin"> Sign in </button>
      <br><br>
      <button type="button" id="register"> Register </button>
    <?php
    }
    ?>
