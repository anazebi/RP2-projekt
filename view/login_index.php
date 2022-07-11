<?php
require_once __DIR__ . '/_headerLoginOrRegister.php';
 ?>

 <hr>
 <br>

 <form action="index.php?rt=login/index" method="POST">
   <table>
     <tr>
       <td> Username: </td>
       <td> <input type="text" name="username"> </td>
       <td></td>
     </tr>
     <tr>
       <td> Password: </td>
       <td> <input type="password" name="password"> </td>
       <td> <button type="submit" name="button"> Prijavi se! </button> </td>
     </tr>
   </table>
 </form>

 <?php
require_once __DIR__ . '/_footer.php';
  ?>
