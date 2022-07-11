<?php
require_once __DIR__ . '/_headerLoginOrRegister.php';
 ?>

 <hr>
 <br>

 <form action="index.php?rt=login/register" method="POST">
   <table>
     <tr>
       <td> Username: </td>
       <td> <input type="text" name="username_register"> </td>
       <td></td>
     </tr>
     <tr>
       <td> Password: </td>
       <td> <input type="password" name="password_register"> </td>
     </tr>
     <tr>
       <td> Email adresa: </td>
       <td> <input type="text" name="email_register" value=""> </td>
       <td> <button type="submit" name="button"> Registriraj se! </button> </td>
     </tr>
   </table>
 </form>

 <?php
require_once __DIR__ . '/_footer.php';
  ?>
