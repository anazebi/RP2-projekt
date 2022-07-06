<?php

require_once __DIR__ . '/../app/database/db.class.php';
require_once __DIR__ .'/product.class.php';
require_once __DIR__ .'/recenzije.class.php';
require_once __DIR__ .'/user.class.php';


class SpecerajService{

    public static function getProductById($id_product)
    {
        $db=DB::getConnection();
        $st=$db->prepare('SELECT * FROM proizvodi WHERE id=:id');
        $st->execute(['id'=>$id_product]);

        $row=$st->fetch();
        return new Product($row['id'], $row['id_trgovina'],$row['ime'],$row['akcija'], $row['cijena']);

    }

    public static function getProductsOnAkcija()
    {
        $db=DB::getConnection();
        $st=$db->prepare('SELECT * FROM proizvodi');
        $st->execute([]);

        $products=[];
        while($row =$st->fetch())
        {
            $id_product=$row['id'];
            if($row['akcija'] !== null)
                $products[]=SpecerajService::getProductById($id_product);
        }

        return $products;
    }

    public static function findProizvod($key_word)
    {
        $db = DB::getConnection();
        $st = $db->prepare('SELECT * FROM proizvodi');
        $st->execute();
        $proizvodi=$st->fetchAll();
        $products=[];
        if ($key_word === "")
            return $products;
        
        foreach($proizvodi as $proizvod)
        {
            foreach($key_word as $word)            
            {
                $ime=strtolower($proizvod['ime']);
                if(strpos($ime, $word) !== false)
                {
                    $id=$proizvod['id'];
                    $products[]=SpecerajService::getProductById($id);
                    break;
                }

            }
        }
        return $products;
    }
}
?>
