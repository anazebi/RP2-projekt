<?php

require_once __DIR__ . '/../app/database/db.class.php';
require_once __DIR__ .'/product.class.php';
require_once __DIR__ .'/review.class.php';
require_once __DIR__ .'/user.class.php';


class Service{

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
}
?>
