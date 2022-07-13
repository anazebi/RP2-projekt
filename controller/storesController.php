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
        $imeTrgovine = $_GET['imeTrgovine'];
        $trgovina = Service::getStoreByName($imeTrgovine);
        $id_trgovine = $trgovina->id;
        $products = Service::getAllProductsInStore($id_trgovine);
        $sale = false;
        $search = "";
        require_once __DIR__.'/../view/products_index.php';
    }

    public function sviNaAkciji()
    {
        $imeTrgovine = $_GET['imeTrgovine'];
        $trgovina = Service::getStoreByName($imeTrgovine);
        $sale = true;
        $search = "";
        $id_trgovine = $trgovina->id;
        $products = Service::getProductsOnSaleInStore($id_trgovine);
        require_once __DIR__.'/../view/products_index.php';
    }

    public function storeInfo()
    {
        $imeTrgovine = $_GET['imeTrgovine'];
        $trgovina = Service::getStoreByName($imeTrgovine);
        $id_trgovine = $trgovina->id;
        $sveRecenzije = Service::getStoreReviews($id_trgovine);
        $ocjena = Service::getStoreRating($imeTrgovine);
        $search = "";
        $sale = false;

        require_once __DIR__.'/../view/stores_storeInfo.php';
    }

    public function najboljaCijena()
    {
        $sve = $_GET['cart'];
        $proizvodi_id = explode(",", $sve);
        $proizvodi = [];

        for($i = 0; $i < count($proizvodi_id); $i++)
        {
          $id = $proizvodi_id[$i];
          if ($id !== "")
            $proizvodi[] = Service::getProductById($id);
        }
        $najboljaTrgovina = Service::getCheapestStoreAndPrice($proizvodi);

        $trgovina = $najboljaTrgovina['cheapest_store'];
        $cijena = $najboljaTrgovina['final_price'];
        require_once __DIR__ . '/../view/products_cart.php';
    }
};


?>
