<?php

require_once __DIR__ . '/../model/service.class.php';

class IndexController
{
  public function index()
  {
    $week_sale = Service::getProductsOnSale();
    require_once __DIR__ . '/../view/week_sale.php';
  }
};

 ?>
