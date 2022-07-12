<?php

require_once __DIR__ . '/../model/service.class.php';
session_start();

class ReviewsController
{
  // defaultna funkcija je dodavanje nove recenzije u bazu
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
      $store_reviews = Service::getStoreReviews($store->id);
      $store_comments = [];

      foreach ($store_reviews as $store_review) {
        $commentbyuser = Service::getUserById($store_review->user_id);
        $commentbyusername = $commentbyuser->username;
        $store_comments[$commentbyusername] = $store_review;
      }

      require_once __DIR__ . '/../view/stores_storeInfo.php';
    }
  }

};

 ?>
