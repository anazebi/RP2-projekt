<?php
require_once __DIR__ . '/_headerNav.php';
?>

<?php
if (isset($trgovina) && isset($cijena) && $trgovina !== "" && $cijena !== "")
{
  ?>
  <div class = "cart">
    <h2> Izračunali smo najbolju ponudu za vašu košaricu: </h2>
    <table>
      <tr>
        <td>TRGOVINA: </td>
        <td> <?php echo $trgovina; ?> </td>
      </tr>
      <tr>
        <td> UKUPNA CIJENA: </td>
        <td> <?php echo $cijena ?> </td>
      </tr>
    </table>
  </div>
<?php
}
// ovaj cemo div oblikovati pomocu javascripta
else
{ ?>
<h2 id = "kosarica_naslov">Proizvodi u vašoj košarici:</h2>
<div class = "cart" id = "cart">
<br>
<table id = "cart_table">

</table>
</div>
<br><br>
<div class="cart">
<hr>
<button type="button" id = "find_best_offer">Pronađi najbolju ponudu!</button>
</div>
<?php
}
?>

<?php
require_once __DIR__ . '/_footer.php';
 ?>
