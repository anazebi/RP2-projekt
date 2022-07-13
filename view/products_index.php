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

<br>
<ul class = "popis">
  <form action="index.php?rt=products/sortiraj&imeTrgovine=<?php echo $imeTrgovine; ?>&sale=<?php echo $sale; ?>&search=<?php echo $search; ?>" method="post">
    <p class = "podnaslov">
      <select name = "sort" class = "sort_select">
        <option value = "silazno"> Silazno po cijeni </option>
        <option value = "uzlazno"> Uzlazno po cijeni </option>
      </select>
      <button type = "submit" class = "sortiranje"> Sortiraj! </button>
    </p>
  </form>
  <hr>
  <br>

<?php
foreach($products as $jedan){
?>
  <p class = "popis_proizvoda">
    <?php
    echo '<h3>' . $jedan->product_name;
    if ($jedan->sale !== null)
    {
      $nova = Service::getFinalPrice($jedan);
      echo '<span class="novo">   -' . $jedan->sale . '% </span></h3>';
      echo '<p class="akcija">Redovna cijena: ' . $jedan->price . 'kn</p>';
      echo 'Posebna ponuda: <span class = "price" style="color:red">' . $nova . 'kn</span>';
      echo '<p hidden id = "proizvod_' . $jedan->id . '">' . $jedan->product_name . '</p>';
      echo '<button id="' . $jedan->id . '"class = "dodaj" onClick = "dodaj_proizvod(this.id)">' . 'Dodaj u ceker</button>';
    }
    else{
      echo "</h3>";
      echo 'Redovna cijena: <span class = "price">' . $jedan->price . 'kn</span>';
      echo '<p hidden id = "proizvod_' . $jedan->id . '">' . $jedan->product_name . '</p>';
      echo '<button id="' . $jedan->id . '"class = "dodaj" onClick = "dodaj_proizvod(this.id)">' . 'Dodaj u ceker</button>';
      echo '</a>';
    }
    ?>
    <hr>
  </p>
<?php
}
?>
