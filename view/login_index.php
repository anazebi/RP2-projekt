<?php
require_once __DIR__ . '/_headerLoginOrRegister.php';
 ?>
 <br>

 <form action="index.php?rt=login/index" method="POST">
   <table style="text-align:center;">
     <tr>
       <td> Username: </td>
       <td> <input type="text" name="username" class = "username"> </td>
       <td></td>
     </tr>
     <tr>
       <td> Password: </td>
       <td> <input type="password" name="password" class = "password"> </td>
       <td> <button type="submit" id="signin2"> Prijavi se! </button> </td>
     </tr>
   </table>
 </form>
</div>

 <?php
require_once __DIR__ . '/_footer.php';
  ?>
