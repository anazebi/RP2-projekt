<?php

require_once __DIR__ .'/service.class.php';

$proizvod1 = Service::getProductById('15');
var_dump($proizvod1);

echo "<br>";
echo "<br>";

$proizvod2 = Service::getProductByName('Svinjska lopatica');
var_dump($proizvod2);

echo "<br>";
echo "<br>";

$akcija = Service::getProductsOnSale();
foreach ($akcija as $proizvod) {
  echo $proizvod->id;
  echo ", ";
  echo $proizvod->product_name;
  echo ", ";
  echo $proizvod->sale;
  echo ", ";
  echo Service::getFinalPrice($proizvod);
  echo "<br>";
}

echo "<br>";
echo Service::getFinalPrice($proizvod1);

echo "<br>";
echo "<br>";

$sortirano = Service::sortByPriceDESC($akcija);
foreach ($sortirano as $proizvod) {
  echo $proizvod->id;
  echo ", ";
  echo $proizvod->product_name;
  echo ", ";
  echo $proizvod->sale;
  echo ", ";
  echo Service::getFinalPrice($proizvod);
  echo "<br>";
}

echo "<br>";
echo "<br>";

$trgovina = Service::getStoreById('6');
print_r($trgovina);

echo "<br>";
echo "<br>";

$trgovine = Service::getAllStores();
print_r($trgovine);

echo "<br>";
echo "<br>";

$tommy = Service::getAllProductsInStore('6');
print_r($tommy);

echo "<br>";
echo "<br>";

$tommyakcija = Service::getProductsOnSaleInStore('6');
print_r($tommyakcija);

echo "<br>";
echo "<br>";

echo Service::getCheck($tommyakcija);

echo "<br>";
echo "<br>";

echo Service::ProductsAvalaibleInStore($tommyakcija, '2');

$tommyakcijakonzum = Service::getProductsFromStore($tommyakcija, '2');
echo "<br>";
echo "<br>";
print_r($tommyakcijakonzum);

echo "<br>";
echo "<br>";
$najboljaponuda = Service::getCheapestStoreAndPrice($tommyakcijakonzum);
echo $najboljaponuda['cheapest store'];
echo ", ";
echo $najboljaponuda['final price'];

echo "<br>";
echo "<br>";
$kava = Service::getProductByName('kava');
$najjeftinije = Service::getCheapestStoreAndPrice($kava);
var_dump($najjeftinije);

echo "<br>";
echo "<br>";

$korisnik = Service::getUserById(5);
var_dump($korisnik);
echo "<br>";
$korisnik = Service::getUserbyName('nikola');
var_dump($korisnik);

echo "<br>";
echo "<br>";

$recenzija = Service::getReviewById(7);
var_dump($recenzija);

echo "<br>";
echo "<br>";

$tommyrecenzije = Service::getStoreReviews(3);
var_dump($tommyrecenzije);

Service::addReview('Uvijek odličan omjer otvorenih blagajni i kupaca!', 5, 7, 5);
 ?>
