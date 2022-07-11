<?php
//klasa koja predstavlja korisnika

class User
{
  protected $id, $username, $pasword_hash, $email, $registration_sequence, $has_registered;

  function __construct($id, $korisnickoime, $sifra, $mail, $reg_seq, $registriran)
  {
    $this->id = $id;
    $this->username = $korisnickoime;
    $this->password_hash = $sifra;
    $this->email = $mail;
    $this->registration_sequence = $registriran;
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
