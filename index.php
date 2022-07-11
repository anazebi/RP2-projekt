<?php
//korisnik pristupa samo skripti index.php
//na osnovu parametara postavljenih u superglobalnoj varijabli $_GET['rt'] radimo preusmjeravanje na zeljeni kontroler, odnosno sadrzaj

  // Ako korisnik pristupi adresi:
  // index.php?rt=con/action, onda ćemo pozvati
  // funkciju action iz kontrolera conController.php.

//ako nije postavljen kontroler, pozivamo akciju index iz indexController
if(isset($_GET['rt']))
{
  $route = $_GET['rt'];
}
else
{
  $route = 'index';
}

// $route == 'con/act' => $controllerName='con', $action='act'
// generiramo potrebne parametre iz stringa u $_GET['rt']
$dijelovi_rute = explode( '/', $route );

$controllerName = $dijelovi_rute[0] . 'Controller';

// ako nije postavljena akcija pozivamo funkciju index iz kontrolera $controllerName
if( isset($dijelovi_rute[1]))
{
	$action = $dijelovi_rute[1];
}
else
{
  $action = 'index';
}

// kontroler $controllerName nalazi se u poddirektoriju controller
$controllerFileName = 'controller/' . $controllerName . '.php';

// includeamo potrebni kontroler
require_once $controllerFileName;

$con = new $controllerName;

//ako akcija ne postoji u objektu $con, onda pozivamo funkciju index
if(!method_exists($con, $action))
{
  $action = 'index';
}

// pozivamo trazenu akciju odnosno funkciju
$con->$action();

?>
