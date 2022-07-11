<?php
require_once __DIR__.'/../model/service.class.php';

class StoresController{

    public function index()
    {
        $sveTrgovine = Service::getAllStores();
        require_once __DIR__ . '/../view/stores_index.php';
    }

    public function sviProizvodi()
    {
        $ime_trgovine = $_GET['ime_trgovine'];
        $id_trgovine = Service::getStoreByName($ime_trgovine);
        $svi_proizvodi = Service::getAllProductsInStore($id_trgovine);
        require_once __DIR__.'/../view/products_index.php';
    }

    public function sviNaAkciji()
    {
        $ime_trgovine = $_GET['ime_trgovine'];
        $id_trgovine = Service::getStoreByName($ime_trgovine);
        $naAkciji = Service::getProductsOnSaleInStore($id_trgovine);
        require_once __DIR__.'/../view/products_index.php';
    }

    public function reviews()
    {
        $ime_trgovine = $_GET['ime_trgovine'];
        $id_trgovine = Service::getStoreByName($ime_trgovine);
        $sveRecenzije = Service::getStoreReviews($id_trgovine);
        require_once __DIR__.'/../view/reviews_index.php';
    }

    public function najboljaCijena()
    {
        $sve = $_GET['data'];
        $proizvodi = explode(',',$p);
        $najboljaTrgovina = Service::getCheapestStoreAndPrice($sve);
        $trgovina = $najboljaTrgovina[0];
        $cijena = $najboljaTrgovina[1];
        require_once __DIR__ . '/../view/products_kosarica.php';
    }
};


?>
