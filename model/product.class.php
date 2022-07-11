<?php
// klasa koja predstavlja proizvod

class Product
{
  protected $id, $product_name, $store_id, $sale, $price;

  function __construct($id, $id_trgovine, $ime_proizvoda, $popust, $cijena)
  {
    $this->id = $id;
    $this->product_name = $ime_proizvoda;
    $this->store_id = $id_trgovine;
    $this->sale = $popust;
    $this->price = $cijena;
  }

  //omogućavaju nam pristupanje protected podacima
  function __set($property, $value)
  {
    if(property_exists($this, $property))
    {
      $this->$property = $value;
    }

    return $this;
  }

  function __get($property)
  {
    if(property_exists($this, $property))
    {
      return $this->$property;
    }
  }
};

 ?>
