<?php
require_once __DIR__ .'/_headerNav.php';
 ?>

 <form action="index.php?rt=products/searchProducts" method="post">
   <h1> Koji proizvod tražite? </h1>
   <table>
    <tr>
      <td> <input type="text" name="search_product"> </td>
      <td> <button type="submit" id = "search_button" name="button"> Traži po prodavaonicama! </button> </td>
    </tr>
   </table>
 </form>
 <br>

 <?php
require_once __DIR__ . '/_footer.php';
  ?>
