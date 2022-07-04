<?php
// klasa koja predstavlja proizvod

class Product
{
  protected $id, $store_name, $store_id, $sale, $price;

  function construct($id, $id_trgovine, $ime_trgovine, $popust, $cijena)
  {
    $this->id = $id;
    $this->store_name = $this->ime_trgovine;
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
