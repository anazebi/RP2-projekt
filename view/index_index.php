<?php 
require_once __DIR__ . '/_headerp.php'; 


if( isset($msg) ){
    echo $msg . '<br>';
}
?>
<hr>
<br>

<form action="index.php?rt=prijava" method="POST">
    <label for="unos_imena" class="text">
        Username:
        <input type="text" name="username" id="unos_imena" class="text">
    </label><br><br>
    <label for="unos_pass" class="text">
        Password:
        <input type="password" name="password" id="unos_pass" class ="text">
    </label>
    <br>
    <br>
    <button class = "text" type="submit">Prijava</button>
</form>

<?php  require_once __DIR__ . '/_footer.php' ?>
