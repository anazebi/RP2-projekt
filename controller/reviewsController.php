<?php

require_once __DIR__ . '/../model/service.class.php';
session_start();

class ReviewsController
{
  // defaultna funkcija je dodavanje nove recenzije u bazu
  // ako nema što za dodati onda viewu prosljeđuje sve recenzije iz baze spremne za prikaz
  public function index()
  {
    if(isset($_POST['review']) && isset($_POST['rating']))
    {
      $username = $_SESSION['username'];
      $imeTrgovine = $_GET['imeTrgovine'];

      $ocjena = Service::getStoreRating($imeTrgovine);

      if($_POST['rating'] !== '' && $_POST['review'] !== '')
      {
        $rating = $_POST['rating'];
        $review = $_POST['review'];

        $store = Service::getStoreByName($imeTrgovine);
        $user = Service::getUserbyName($username);

        // u bazu dodajemo novu recenziju korisnika
        Service::addReview($review, $rating, $user->id, $store->id);

      }
      //dohvatimo sve recenzije za danu trgovinu
      $sveRecenzije = Service::getStoreReviews($store->id);
      $search = "";
      $ocjena = Service::getStoreRating($imeTrgovine);


      //podatke prosljeđujemo viewu koji prikazuje informacije o trgovini
      require_once __DIR__ . '/../view/stores_storeInfo.php';
    }
  }

};

 ?>
