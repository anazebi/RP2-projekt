<?php
    class Recenzija{

            protected $id,$id_trgovina,$id_korisnik, $ocjena, $review;

            function __construct($id,$id_trgovina,$id_korisnik, $ocjena, $review)
            {
                $this->id=$id;
                $this->id_trgovina=$id_trgovina;
                $this->id_korisnik=$id_korisnik;
                $this->ocjena=$ocjena;
                $this->review=$review;                
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
