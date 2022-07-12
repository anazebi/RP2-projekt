<?php
require_once __DIR__ . '/_headerNav.php';

if (isset($trgovina) && isset($cijena) && $trgovina !== "" && $cijena !== "")
{
  ?>
  <div class = "best_offer">
    <h3> IzraÄunali smo najbolju ponudu za vaÅ¡u koÅ¡aricu: </h3>
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
<br><br>
</div>
<button type="button" id = "find_best_offer">PronaÄ‘i najbolju ponudu!</button>
<?php
require_once __DIR__ . '/_footer.php';
 ?>

