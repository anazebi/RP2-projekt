<!DOCTYPE html>
<html>
<head>   
<meta charset="UTF-8">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
   <script type="text/javascript" src="javascript/naslovna.js"></script>
   <script type="text/javascript" src="javascript/javasc.js"></script>
   <script type="text/javascript" src="javascript/moja_kosarica.js"></script>
    <title>Špeceraj</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<canvas width="$(window).width()+70" height="400" id="canvas" style="position: relative; top:0; left:0;"></canvas>
<nav id="navbar">
    <ul>
        <li>
            <a href="index.php?rt=trgovine/index">Trgovine</a> 
        </li>
        <li>
            <a href="index.php?rt=index/index">Proizvodi na akciji</a> 
        </li>
        <li>
            <a href="index.php?rt=proizvodi/search">Pretraživanje</a> 
        </li>
        <li>
            <a href="index.php?rt=proizvodi/kosarica">Moja košarica</a>  
        </li>

    </ul>
</nav>

<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if(isset($_SESSION['prijava'])){
        if($_SESSION['prijava']===true){
            echo '<button id="btn-odjava" style="position: absolute; top:60px; right:20px;">Odjava</button>
            <br><br>';
        }
        else{
            echo '<button id="btn-prijava" style="position: absolute; top:60px; right:20px;">Prijava</button>
            <br><br>
            <button id="btn-registracija" style="position: absolute; top:120px; right:20px;">Registracija</button>';
        }
        
    }
    else{
        echo '<button id="btn-prijava" style="position: absolute; top:60px; right:60px;">Prijava</button>
        <br><br>
        <button id="btn-registracija" style="position: absolute; top:120px; right:60px;">Registracija</button>';
    }
?>


