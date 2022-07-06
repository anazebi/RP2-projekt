<?php
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
