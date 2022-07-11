<?php

require_once __DIR__ . '/../model/service.class.php';

class ReviewsController
{
  public function index()
  {
    if(isset($_POST['review']) && isset($_POST['rating']))
    {
      $username = $_SESSION['username'];
      $store_name = $_GET['store_name'];

      $prosjecna_ocjena = Service::getStoreRating($store_name);

      if($_POST['rating'] !== '' && $_POST['review'] !== '')
      {
        $rating = $_POST['rating'];
        $review = $_POST['review'];

        $store = Service::getStoreByName($store_name);
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
