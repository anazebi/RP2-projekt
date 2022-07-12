<?php
require_once __DIR__.'/../model/service.class.php';

class ProductsController{

    //funkcija koja će prikazivati view sa proizvodima na akciji
    //tri ce funkcije pozivati isti view pa cemo u ovisnosti o sadržaju varijabli $imeTrgovine, $sort, $sale i $search znati koje porizvode prikazati
    //products_index dobiva listu proizvoda za prikaz u $products te prije navedene varijable
    public function index()
    {
        $products = Service::getProductsOnSale();
        $imeTrgovine = "";
        $sort = "";
        $sale = true;
        $search = "";
        require_once __DIR__.'/../view/products_index.php';
    }

    public function search()
    {
        require_once __DIR__.'/../view/products_search.php';
    }

    // pronalazi trazene proizvode i poziva pripadni view
    public function searchProducts()
    {
        if(isset($_POST['search'])){
            $search = $_POST['search'];
            $products = Service::getProductByName($search);
            $imeTrgovine = "";
            $sort = "";
            $sale = false;
            require_once __DIR__.'/../view/products_index.php';
        }
        else{
            require_once __DIR__.'/../view/products_search.php';
        }
    }

    // sortirano prikazuje sve proizvode iz dane trgovine
    // ako je postavljen $sale na true tada prikazuje samo prozvode na akciji
    // ako je postavljen $search tada onda prikazuje samo proizvode s danim imenom
    public function sortiraj()
    {
        $imeTrgovine = $_GET['imeTrgovine'];
        $sale = $_GET['sale'];
        $sort = $_POST['sort'];
        $search = "";
        $search = $_GET['search'];

        $products = [];

        // ako je $sale true i $imeTrgovine postavljeno prikazujemo samo proizvode na akicji iz dane trgovine
        if($imeTrgovine !== "" && $sale !== false){
            $store = Service::getStoreByName($imeTrgovine);
            $store_id = $store->id;
            $products = Service::getProductsOnSaleInStore($store_id);
        }
        // ako je $sale false i $imeTrgovine postavljeno prikazujemo sve proizvode iz trgovine $imeTrgovine
        else if($imeTrgovine !== "")
        {
            $store = Service::getStoreByName($imeTrgovine);
            $store_id = $store->id;
            $proizvodi = Service::getAllProductsInStore($store_id);
        }
        //ako je postavljen kriterij pretrage po imenu proizvoda
        else if($search !== "" && $imeTrgovine==="" && $sale === false){
            $products = Service::getProductByName($search);
        }
        // inace jednostavno dohvacamo sve proizvode na akciji
        else{
            $products = Service::getProductsOnSale();
        }

        // ako je postavljen kriterij sortiranja dobivene proizvode sortiramo
        if($sort === 'uzlazno'){
            $products = Service::sortByPriceASC($products);
        }
        else if ($sort === "silazno"){
            $products = Service::sortByPriceDESC($products);
        }

        require_once __DIR__.'/../view/products_index.php';
    }

    public function kosarica()
    {
        require_once __DIR__.'/../view/products_kosarica.php';
    }
}

?>
