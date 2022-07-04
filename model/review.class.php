<?php
// klasa koja predstavlja recenziju

class Review
{
  protected $id, $store_id, $user_id, $comment, $rating;

  function __construct($id, $id_trgovine, $id_korisnika, $komentar, $ocjena)
  {
    $this->id = $id;
    $this->store_id = $id_trgovine;
    $this->user_id = $id_korisnika;
    $this->comment = $komentar;
    $this->rating = $ocjena;
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
