<?php
require_once __DIR__ . '/_header.php'; 
?>

<strong class="podnaslov">
    <?php 

    if($ime_trgovine!== "")
        echo 'Dobrodošli u  <strong style="color:DarkGreen">'.$ime_trgovine!'</strong><br>';
        echo '<a href="index.php?rt=trgovine/naAkciji&ime_trgovine='.$ime_trgovine.'" >';
        echo '<p >  Prikaži proizvode na ovotjednoj akciji'.'</p><br>';
        echo '</a>'; 
        if($ocjena !== -1)
            echo 'Ocjena: <strong style="color:YellowGreen">'.$ocjena.'</strong><br>';
        else echo 'Ova trgovina još nema recenzija!'
    ?> 
</strong>


