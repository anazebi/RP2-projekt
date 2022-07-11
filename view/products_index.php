<?php
require_once __DIR__ . '/_headerNav.php';
?>

<strong class="podnaslov">
    <?php

    if($imeTrgovine!== "")
        echo 'Proizvodi koji su dostupni u  <strong style="color:DarkGreen">'.$ime_trgovine.'</strong>';

    ?>
</strong>

<strong class="trazenje">
    <?php
    if($pretraga !== ""){
        echo 'Rezultati pretrage za proizvod:<strong style="color:YellowGreen">'.$traziPo.'</strong>';
    }
    ?>
</strong>

<ul class="lista_proiz">
<?php
        $temp=[];
        if($trazeno !== $temp)
        {
?>
            <form action="index.php?rt=products/sortiraj&ime=<?php echo $ime_trgovine ?>&traziPo=<?php echo $traziPo ?>
            &akcija=<?php echo $akcija ?>" method="post">
            <strong class="podnaslov" > Sortiraj po:
            <select name="nacin">
                            <option value="uzlazno"> Cijena uzlazno </option>
                            <option value="silazno"> Cijena silazno </option>
                        </select>
            <button type="submit" class="sort"> Sortiraj! </button>
        </strong>
        <br><br>
        <?php
            foreach($trazeno as $product)
            {
                echo '<li class="products">';
                echo '<p id = "pr_'.$product->id.'">'.$product->name.'</p>';
                if ($product->akcija !== null)
                {
                    $newPrice = round($product->price - ($product->akcija/100)*$product->price, 2);
                    echo '<span class="novo">-'.$product->akcija.'% </span>';
                    echo '<p class="akcija">'.$product->price.'kn</p>';
                    echo '<button id="'.$product->id.'"class = "dodajUkosaricu" onClick="dodaj_proizvod(this.id)">'.'Dodaj u košaricu</button>';
                    echo '</a>';
                    echo 'Sada samo: <span class="novo">'.$newPrice.'kn</span></li>';

                }
                else{
                    echo '<p>'.$product->price.'kn</p>';
                    echo '<button id="'.$product->id.'"class = "dodajUkosaricu" onClick="dodaj_proizvod(this.id)">'.'Dodaj u košaricu</button>';
                    echo '</a>';
                }
            }
    }

    ?>
    </ul>

<?php  require_once __DIR__ . '/_footer.php' ?>
