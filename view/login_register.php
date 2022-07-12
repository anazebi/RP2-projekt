<?php
require_once __DIR__ . '/_headerLoginOrRegister.php';
 ?>
 <br>

 <form action="index.php?rt=login/register" method="POST">
   <table>
     <tr>
       <td> Username: </td>
       <td> <input type="text" name="username_register" class="username"> </td>
       <td></td>
     </tr>
     <tr>
       <td> Password: </td>
       <td> <input type="password" name="password_register" class = "password"> </td>
     </tr>
     <tr>
       <td> Email adresa: </td>
       <td> <input type="text" name="email_register" value="" class = "email"> </td>
       <td> <button type="submit" name="button" id ="register2"> Registriraj se! </button> </td>
     </tr>
   </table>
 </form>

 <?php
require_once __DIR__ . '/_footer.php';
  ?>
