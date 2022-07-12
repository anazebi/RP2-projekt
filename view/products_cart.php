<?php
require_once __DIR__ . '/_headerNav.php';

if (isset($trgovina) && isset($cijena) && $trgovina !== "" && $cijena !== "")
{
  ?>
  <div class = "best_offer">
    <h3> Izračunali smo najbolju ponudu za vašu košaricu: </h3>
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
<div class = "cart">
<br><br>
<button type="button" id = "find_best_offer">Pronađi najbolju ponudu!</button>
</div>

<?php
require_once __DIR__ . '/_footer.php';
 ?>
