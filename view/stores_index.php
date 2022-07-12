<?php
require_once __DIR__ . '/_headerNav.php';
?>
<div class = "allstores">
<h2>Odaberite prodavaonicu s popisa:</h2>
<p>Nakon odabira možete saznati više o ponudi prodavaonice te iskustvima kupaca.</p>
<br>
<ul class = "stores">
<?php
    $temp=[];
    if($sveTrgovine !== $temp)
    {
      foreach($sveTrgovine as $trgovina)
      {
        $store_name = $trgovina->name;
        echo '<li class="store" >';
        echo '<a href="index.php?rt=stores/storeInfo&imeTrgovine=' . $store_name . '">';
        echo $store_name . '<br><br>';
        echo '</a>';
      }
    }
    ?>
</ul>
</div>

<?php  require_once __DIR__ . '/_footer.php' ?>
