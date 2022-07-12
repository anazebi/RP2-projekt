<?php
require_once __DIR__ . '/_headerNav.php';
require_once __DIR__ . '/../model/service.class.php';
?>

<div class = "products_index">
<?php

//ispisujemo podnaslove ako je postavljeno ime trgovine ili ime trazenog proizvoda
  if($imeTrgovine !== "")
    echo '<h2>Dobrodošli u  <strong style="color:DarkGreen">' . $imeTrgovine . '</strong> online-prodavaonicu!</h2>';
?>

<?php
  if($search !== "")
    echo '<h2>Rezultati pretraživanja za proizvod <strong style="color:DarkGreen">' . $search . ':</strong></h2>';
?>


<ul class = "popis">
  <form action="index.php?rt=products/sortiraj&imeTrgovine=<?php echo $imeTrgovine; ?>&sale=<?php echo $sale; ?>&search=<?php echo $search; ?>" method="post">
    <p class = "podnaslov"> Sortiranje po:
      <select name = "sort" class = "sort_select">
        <option value = "silazno"> Silazno po cijeni </option>
        <option value = "uzlazno"> Uzlazno po cijeni </option>
      </select>
      <button type = "submit" class = "sortiranje"> Sortiraj! </button>
    </p>
  </form>

<?php
foreach($products as $jedan){
?>
  <p class = "popis">
    <?php
    echo '<p id = "proizvod_' . $jedan->id . '">' . $jedan->product_name . '</p>';
    if ($jedan->sale !== null)
    {
      $nova = Service::getFinalPrice($jedan);
      echo '<span class="novo">-' . $jedan->sale . '% </span>';
      echo '<p class="akcija">' . $jedan->price . 'kn</p>';
      echo '  Posebna ponuda: <span class = "novo">' . $nova . 'kn</span></li>';
      echo " ";
      echo '<button id="' . $jedan->id . '"class = "dodaj" onClick = "dodaj_proizvod(this.id)">' . 'Dodaj u ceker</button>';
    }
    else{
      echo '<p>' . $jedan->price . 'kn</p>';
      echo '<button id="' . $jedan->id . '"class = "dodaj" onClick = "dodaj_proizvod(this.id)">'.'Dodaj u ceker</button>';
      echo '</a>';
    }
    ?>
  </p>
<?php
}
?>
