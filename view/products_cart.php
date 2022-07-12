<?php
require_once __DIR__ . '/_headerNav.php';
?>
<h2 id = "kosarica_naslov">Proizvodi u vašoj košarici:</h2>
<?php
if (isset($trgovina) && isset($cijena) && $trgovina !== "" && $cijena !== "")
{
  ?>
  <div class = "best_offer">
    <h2> Izračunali smo najbolju ponudu za vašu košaricu: </h2>
    <table>
      <tr>
        <td> <?php echo $trgovina; ?> </td>
        <td> <?php echo $cijena ?> </td>
      </tr>
    </table>
  </div>
<?php
}
// ovaj cemo div oblikovati pomocu javascripta
?>
<div class = "cart" id = "cart">
<br>
<table id = "cart_table">

</table>
</div>
<br><br>
<div class="cart">
<button type="button" id = "find_best_offer">Pronađi najbolju ponudu!</button>  
</div>


<?php
require_once __DIR__ . '/_footer.php';
 ?>
