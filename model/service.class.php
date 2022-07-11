<?php

require_once __DIR__ . '/../app/database/db.class.php';
require_once __DIR__ .'/product.class.php';
require_once __DIR__ .'/review.class.php';
require_once __DIR__ .'/user.class.php';

//klasa service za interakciju aplikacije i baze podataka
class Service{

    //funkcija za login korisnika
    public static function Login($username, $password){

        $db = DB::getConnection();
        $st = $db->prepare('SELECT password_hash FROM korisnici WHERE username = :username');
        $st->execute(['username' => $username]);

        if( $st->rowCount() !== 1){
            $proceed = false;
        }
        elseif(password_verify( $password, $st->fetch()["password_hash"])){
            $proceed = true;
        }
        else{
            $proceed = false;
        }

        if($proceed){
            $secret_word = 'PogodiAkoSiFaca';
            $_SESSION['login'] = $username . ',' . md5( $username . $secret_word);
            $_SESSION['username'] = $username;
        }
        return $proceed;
    }

    //funkcija za registraciju novog korisnika
    public static function Register($username, $password, $email){
        $db = DB::getConnection();
        $st = $db->prepare( 'INSERT INTO projekt_users(username, password_hash, email, registration_sequence, has_registered) VALUES (:username, :password, :email, \"idc\", \"1\")' );
        $st->execute(array( 'username' => $username, 'password' => password_hash( $password, PASSWORD_DEFAULT ), 'email' => $email));

        if($st->rowCount() !== 1){
            $proceed = false;
        }
        else{
            $proceed = true;
        }

        if($proceed){
            $secret_word = 'PogodiAkoSiFaca';
            $_SESSION['login'] = $username . ',' . md5( $username . $secret_word);
            $_SESSION['username'] = $username;
        }
        return $proceed;
    }

    //logout korisnika
    function Logout(){

        session_unset();
        session_destroy();
    }

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

    // funkcija koja dohvaca trgovinu po identifikatoru
    //koristimo u narednim funkcijama za dohvat trgovina
    public static function getStoreById($id_store)
    {
      $db = DB::getConnection();
      $st = $db->prepare('SELECT * FROM trgovine WHERE id = :id');
      $st->execute(['id' => $id_store]);

      $row = $st->fetch();
      $name_store = $row['name'];

      $trgovina = New Store($id_store, $name_store);

      return $trgovina;
    }

    //funkcija za dohvat svih trgovina
    public static function getAllStores()
    {
      $db = DB::getConnection();
      $st = $db->prepare('SELECT * FROM trgovine');
      $st->execute([]);

      $trgovine = [];
      while($row = $st->fetch())
      {
          $id_store = $row['id'];
          $trgovine[] = Service::getStoreById($id_store);
      }
      return $trgovine;
    }

    //funkcija za dohvat svih proizvoda u trgovini
    public static function getAllProductsInStore($id_store)
    {
      $db = DB::getConnection();
      $st = $db->prepare('SELECT * FROM proizvodi WHERE id_trgovina = :id');
      $st->execute(['id' => $id_store]);

      $proizvodi = [];
      while($row = $st->fetch())
      {
        $id_proizvoda = $row['id'];
        $proizvod = Service::getProductById($id_proizvoda);
        $proizvodi[] = $proizvod;
      }
      return $proizvodi;
    }

    //funkcija za dohvat svih proizvoda na akciji u danoj trgovini
    //koristimo prethodno napisanu funkcju za dohvat svih proizvoda u trgovini
    public static function getProductsOnSaleInStore($id_store)
    {
      $allproducts = Service::getAllProductsInStore($id_store);
      $broj_proizvoda = count($allproducts);
      $onsale = [];

      for($i = 0; i < $broj_proizvoda; $i++)
      {
        if($allproducts[$i]->sale !== null)
          $onsale[] = $allproducts[$i];
      }
      return $onsale;
    }

    //vraca ukupnu cijenu proizvoda u kosarici
    public static function getCheck($products)
    {
      $final_price = 0;
      foreach ($products as $product) {
        $final_price += Service::getFinalPrice($product);
      }
      return $final_price;
    }

    //provjerava jesu li svi proizvodi s popisa dostupni u odredenoj trgovini
    //koristimo pri racunanju najjeftinije kosarice i odredivanju najpovoljnije trgovine za dane proizvode
    public static function ProductsAvalaibleInStore($products, $store_id)
    {
      $dostupno = 0;

      foreach ($products as $product) {
        $allstores = Service::getProductByName($product->name)
        foreach ($allstores as $product_store) {
          if($product_store->id_trgovine === $store_id) $dostupno = 1;
          else break;
        }
        if($dostupno === 0) return 0;
        else $dostupno = 0;
      }
      return 1;
    }

    //koristimo samo ako PorductsAvaliableInStore($products, $store_id) = 1
    public static function getProductsFromStore($products, $store_id)
    {
      $allproducts = Service::getAllProductsInStore($store_id);
      $products_store = [];

      foreach ($allproducts as $product_store) {
        foreach ($products as $product) {
          if ($product->product_name === $product_store->product_name)
          {
            $products_store[] = $product_store;
            break;
          }
        }
      }
      return $products_store;
    }

    //za određeni proizvod/proizvode vracamo ime trgovine s najnizom ukupnom cijenom i tu cijenu
    public static function getCheapestStore($products)
    {
      $allstores = Service::getAllStores();
      $final_price = 0;

      foreach ($allstores as $store) {
        if(ProductsAvalaibleInStore($products, $store->id))
        {
          $products_store = Service::getProductsFromStore($products, $store->id);
          $price = Service::getCheck($products_store);
          if($price < $final_price || $final_price ===0)
          {
            $final_price = $price;
            $cheapest_store = $store->name;
          }
        }
      }
      return $rezultat = array('cheapest store' => $cheapest_store, 'final price' => $final_price);
    }

    //dohvacanje korisnika po identifikatoru
    public static function getUserbyId($user_id)
    {
      $db = DB::getConnection();
      $st = $db->prepare('SELECT * FROM korisnici WHERE id = :id');
      $st->excute(array('id' => $user_id));
      $row = $st->fetch();

      $username = $row['username'];
      $password_hash = $row['password_hash'];
      $email = $row['email'];
      $reg_sifra = $row['reg_sifra'];
      $registriran = $row['registriran'];

      return New User($user_id, $username, $password_hash, $email, $reg_sifra, $registriran);
    }

    //dohvaćanje korisnika po korisnickom imenu
    public static function getUserbyName($username)
    {
      $db = DB::getConnection();
      $st = $db->prepare('SELECT * FROM korisnici WHERE username = :username');
      $st->excute(array('username' => $username));
      $row = $st->fetch();

      return Service::getUserById($row['id']);
    }

    //dodavanje recenzije u bazu podataka
    public static function addReview($review, $rating, $user_id, $store_id)
    {
      try{
        $db = DB::getConnection();
        $st = $db->prepare( 'INSERT INTO recenzije(id_trgovina, id_korisnik, ocjena, review) VALUES (:id_trgovina, :id_user, :ocjena, :komentar)' );
        $st->execute( array('id_trgovina' => $store_id, 'id_user' => $user_id, 'ocjena' =>$rating , 'komentar' => $review));
      }
      catch(PDOException $e) { exit( "PDO error: " . $e->getMessage()); }
    }

    public static function getReviewById($review_id)
    {
      $db = DB::getConnection();
      $st = $db->prepare('SELECT * FROM recenzije WHERE id = :id');
      $st->execute(array('id' = > $review_id));

      $row = $st->fetch();
      $id_trgovina = $row['id_trgovina'];
      $id_korisnik = $row['id_korisnik'];
      $ocjena = $row['ocjena'];
      $review = $row['review'];

      $rezultat = New Review($review_id, $id_trgovina, $id_korisnik, $review, $ocjena);
      return $rezultat;
    }

    public static function getStoreReviews($store_id)
    {
      $db = DB::getConnection();
      $st = $db->prepare('SELECT * FROM recenzije WHERE id_trgovina = :store_id');
      $st->execute(array('id_trgovina' => $store_id));

      $store_reviews = [];
      while($row = $st->fetch())
      {
          $recenzija = Service::getReviewById($row['id']);
          $store_reviews[] = $recenzija;
      }

      return $store_reviews;
    }

};
?>
