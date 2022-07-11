<!DOCTYPE html>
<html lang="hr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Špeceraj</title>
    <link rel = "stylesheet" href="css/master.css">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <script type = "text/javascript" src="javascript/naslovnica.js"></script>
    <script type = "text/javascript" src="javascript/funkcije.js"></script>
  </head>
  <body>

    <?php
    // koristimo javascript canvas da bismo po slici postavljenoj u zaglavlju ispisali ime nase stranice
     ?>
    <canvas id="canvas" width="300" height="300"></canvas>
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

    if(isset($_SESSION['logged']))
    {
      if($_SESSION['logged'] === true)
      {
      ?>
        <button type="button" name="signout"> Sign out </button>
        <br><br>
      <?php
      }
      else
      {
      ?>
        <button type="button" name="signin"> Sign in </button>
        <br><br>
        <button type="button" name="register"> Register </button>
      <?php
      }
    }
    else
    {
    ?>
      <button type="button" name="signin"> Sign in </button>
      <br><br>
      <button type="button" name="register"> Register </button>
    <?php
    }
    ?>
