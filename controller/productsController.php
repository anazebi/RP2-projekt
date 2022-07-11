<?php
require_once __DIR__.'/../model/service.class.php';

class ProductsController{

    public function index()
    {
        $username=$_GET['username'];
        $id_user = Service::getUserbyName($username);
        $trazeno = Service::getProductsOnSale();
        $imeTrgovine = "";
        require_once __DIR__.'/../view/products_index.php';
    }

    public function search()
    {
        require_once __DIR__.'/../view/products_index.php';
    }

    public function searchProducts()
    {
        if(isset($_POST['search'])){
            $traziPo = $_POST['search'];
            $trazeno = Service::getProductsByName($traziPo);
            require_once __DIR__.'/../view/products_index.php';
        }
        else{
            require_once __DIR__.'/../view/search_index.php';
        }
    }

    public function sortiraj()
    {
        $imeTrgovine = $_GET['ime_trgovine'];
        $akcija = $_GET['akcija'];
        $nacin = $_POST['nacin'];
        $pretraga = "";
        $pretraga = $_GET['pretraga'];
        $proizvodi = [];
        $trazeno = [];

        if($imeTrgovine !== "" && $akcija !== ""){
            $idTrgovine = Service::getStoreByName($imeTrgovine);
            $proizvodi = Service::getProductsOnSaleInStore($idTrgovine);
        }

        else if($imeTrgovine !== "")
        {
            $idTrgovine = Service::getStoreByName($imeTrgovine);
            $proizvodi = Service::getAllProductsOnSale($idTrgovine);
        }

        else if($pretraga !== "" && $imeTrgovine==="" && $akcija === ""){
            $trazeno = Service::getProductByName($pretraga);
        }

        else{
            $proizvodi = Service::getProductsOnSale();
        }

        if($akcija === 'uzlazno'){
            $trazeno = Service::sortByPriceASC($proizvodi);
        }

        else{
            $trazeno = Service::sortByPriceDESC($proizvodi);
        }

        require_once __DIR__.'/../view/products_index.php';
    }

    public function kosarica()
    {
        require_once __DIR__.'/../view/kosarica_index.php';
    }
}

?>
