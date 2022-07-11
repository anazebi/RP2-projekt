<?php
require_once __DIR__ . '/_header.php'; 
?>

<p class = "podnaslov">
    <?php

    if($imeTrgovine !== "")
        echo 'Dobrodošli u trgovinu '.$imeTrgovine.'!';
    ?>
</p>

<p class = "podnaslov">
    <?php
    if($pretraga !== "")
        echo 'Pretraga prema nazivu '.$pretraga.'.';
    ?>
</p>

<ul class = "popis">
        <form action="" method="post">
            <p class = "podnaslov"> Sortiranje po:
                <select name = "nacin">
                    <option value = "silazno">Silazno po cijeni </option>
                    <option value = "uzlazno">Uzlazno po cijeni </option>
                </select>
                <button type = "submit" class = "sortiranje"> Sortiraj! </button>
            </p>
        </form>
    <?php
    foreach($trazeno as $jedan){
        ?>
        <p class = "popis">
            <?php
            echo '<p id = "proiz'.$jedan->ime.'</p>';
            if ($jedan->popust !== null)
                {
                    $nova = round($jedan->cijena - ($jedan->popust/100)*$jedan->cijena, 2);
                    echo '<span class="novo">-'.$jedan->popust.'% </span>';
                    echo '<p class="akcija">'.$jedan->cijena.'kn</p>';
                    echo '<button id="'.$jedan->id.'"class = "dodaj" onClick="dodaj_proizvod(this.id)">'.'Dodaj u košaricu</button>';
                    echo '</a>';
                    echo 'Sada samo: <span class="novo">'.$nova.'kn</span></li>';                    
                }
                
                else{
                    echo '<p>'.$jedan->cijena.'kn</p>';
                    echo '<button id="'.$jedan->id.'"class = "dodaj" onClick="dodaj_proizvod(this.id)">'.'Dodaj u košaricu</button>';
                    echo '</a>';
                }  
                ?>
        </p> 
    <?php
    }
?>

