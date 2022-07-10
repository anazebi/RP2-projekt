<?php

require_once __DIR__ . '/../app/database/db.class.php';
require_once __DIR__ .'/product.class.php';
require_once __DIR__ .'/review.class.php';
require_once __DIR__ .'/user.class.php';


class Service{

    // funkcija za dohvat proizvoda po identifikatoru, koristimo je u iducim funkcijama za dohvat podataka da smanjimo nepotrebna ponavljanja u kodu
    public static function getProductById($id_product)
    {
        $db = DB::getConnection();
        $st = $db->prepare('SELECT * FROM proizvodi WHERE id = :id');
        $st->execute(['id' => $id_product]);

        $row = $st->fetch();
        $id_proizvoda = $row['id'];
        $id_trgovine = $row['id_trgovina'];
        $ime_proizvoda = $row['ime'];
        $popust = $row['akcija'];
        $cijena = $row['cijena'];

        $proizvod = new Product($id_proizvoda, $id_trgovine, $ime_proizvoda, $popust, $cijena);

        return $proizvod;
    }

    //funkcija koja korisniku omogucava pretrazivanje proizvoda po imenu
    public static function getProductByName($product_name)
    {
      $db = DB::getConnection();
      $st = $db->prepare('SELECT * FROM proizvodi');
      $st->execute([]);
      $ime_trazilica = strtolower($product_name);

      $products = [];
      while($row = $st->fetch())
      {
        //korisniku dopustamo da unese tek neku od rijeci iz imena proizvoda te mu vracamo sve proizvode koji sadrze danu rijec u imenu
        //npr za unos kruh u trazilicu korisnik dobiva na raspolaganje i crni i bijeli kruh
        $ime_baza = strtolower($row['ime']);
        if(strpos($ime_baza, $ime_trazilica))
        {
          $products[] = DB::getProductById($row['id']);
        }
      }
      return $products;
    }

    //dohvacanje svih proizvoda na rasprodaji
    public static function getProductsOnSale()
    {
        $db = DB::getConnection();
        $st = $db->prepare('SELECT * FROM proizvodi where popust IS NOT NULL');
        $st->execute([]);

        $products = [];
        while($row = $st->fetch())
        {
            $product_id = $row['id'];
            $products[] = Service::getProductById($product_id);
        }
        return $products;
    }

    //funkcija za dohvaćanje konačne cijene proizvoda
    public static function getFinalPrice($product)
    {
      if($product->sale === null)
        $final_price = $product->price;
      else {
        $popust = $product->price * ($product->sale / 100);
        $final_price = $product->price - $popust;
      }

      return $final_price;
    }

    //sortiranje proizvoda uzlazno po cijeni
    public static function sortByPriceASC($products)
    {
      $duljina_liste = count($products);

      while($promjena !== 0)
      {
        $promjena = 0;

        for($i = 0; i < $duljina_liste - 1; $i++)
        {
          $price_i = Service::getFinalPrice($products[$i]);
          $price_iplus = Service::getFinalPrice($products[$i + 1]);

          if($price_i > $price_iplus)
          {
            $promjena = 1;
            $temp = $products[$i];
            $products[$i] = $products[$i + 1];
            $products[$i + 1] = $temp;
          }
        }
      }

      return $products;
    }

    //sortiranje proizvoda silazno po cijeni
    public static function sortByPriceDESC($products)
    {
      $duljina_liste = count($products);

      while($promjena !== 0)
      {
        $promjena = 0;

        for($i = 0; i < $duljina_liste - 1; $i++)
        {
          $price_i = Service::getFinalPrice($products[$i]);
          $price_iplus = Service::getFinalPrice($products[$i + 1]);

          if($price_i < $price_iplus)
          {
            $promjena = 1;
            $temp = $products[$i];
            $products[$i] = $products[$i + 1];
            $products[$i + 1] = $temp;
          }
        }
      }

      return $products;
    }



};
?>
