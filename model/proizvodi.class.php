<?php
    class Product{

            protected $id,$id_trgovina,$ime, $akcija, $cijena;

            function __construct($id,$id_trgovina,$ime, $akcija, $cijena)
            {
                $this->id=$id;
                $this->id_trgovina=$id_trgovina;
                $this->ime=$ime;
                $this->akcija=$akcija;
                $this->cijena=$cijena;                
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
