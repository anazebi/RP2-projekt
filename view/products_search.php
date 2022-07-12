<?php
require_once __DIR__ .'/_headerNav.php';
 ?>

<div class = "search">
 <form action="index.php?rt=products/searchProducts" method="post">
   <h2> Koji proizvod tražite? </h2>
   <table>
    <tr>
      <td> <input type="text" name="search" id="search_input"> </td>
      <td> <button type="submit" id = "search_button" name="button"> Traži po prodavaonicama! </button> </td>
    </tr>
   </table>
 </form>
</div>
<br><br><br>
 <?php
require_once __DIR__ . '/_footer.php';
  ?>
