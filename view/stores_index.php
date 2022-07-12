<?php
require_once __DIR__ . '/_headerNav.php';
?>

<h3>Odaberite prodavaonicu s popisa:</h3>
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

<?php  require_once __DIR__ . '/_footer.php' ?>
