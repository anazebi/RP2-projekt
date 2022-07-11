<?php

require_once __DIR__ . '/../model/service.class.php';

class IndexController
{
  public function index()
  {
    $products = Service::getProductsOnSale();
    $imeTrgovine = "";
    $sort = "";
    $sale = true;
    $search = "";
    require_once __DIR__ . '/../view/products_index.php';
  }
};

 ?>
