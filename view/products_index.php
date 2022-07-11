<?php
require_once __DIR__ . '/_headerNav.php';
require_once __DIR__ . '/../model/service.class.php';
?>

<p class = "podnaslov">
<?php

  if($imeTrgovine !== "")
      echo 'Dobrodošli u trgovinu ' . $imeTrgovine.'!';
?>
</p>

<p class = "podnaslov">
    <?php
    if($search !== "")
        echo 'Pretraga prema nazivu ' . $search . '.';
    ?>
</p>

<ul class = "popis">
  <form action="index.php?rt=products/sortiraj&imeTrgovine=<?php echo $imeTrgovine; ?>&sale=<?php echo $sale; ?>&search=<?php echo $search; ?>" method="post">
    <p class = "podnaslov"> Sortiranje po:
      <select name = "sort">
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
      echo '<button id="' . $jedan->id . '"class = "dodaj" onClick = "dodaj_proizvod(this.id)">' . 'Dodaj u košaricu</button>';
      echo '</a>';
      echo '  Sada samo: <span class = "novo">' . $nova . 'kn</span></li>';
    }
    else{
      echo '<p>' . $jedan->price . 'kn</p>';
      echo '<button id="' . $jedan->id . '"class = "dodaj" onClick = "dodaj_proizvod(this.id)">'.'Dodaj u košaricu</button>';
      echo '</a>';
    }
    ?>
  </p>
<?php
}
?>
