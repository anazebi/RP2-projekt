<?php
<<<<<<< HEAD
    class User{

            protected $id, $username, $password_hash, $email;

            function __construct($id, $username, $password_hash, $email)
            {
                $this->id=$id;
                $this->username=$username;
                $this->password_hash=$password_hash;
                $this->email=$email;
           
            }

            function __get($property)
            {
                if( property_exists( $this, $property ) )
                 return $this->$property;
            }

            function __set($property, $value)
            {
                if( property_exists( $this, $property) )
                 $this->$property = $value;
                
                return $this;               
            }
    };
?>
=======
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
>>>>>>> 95646d9066c4f407613891b18d2ebc251522ee28
