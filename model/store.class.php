<?php

class Store
{
  protected $id, $name;

  function __construct($id, $ime)
  {
    $this->id = $id;
    $this->name = $ime;
  }

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
