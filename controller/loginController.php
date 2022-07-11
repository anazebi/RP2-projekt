<?php

session_start();
require_once __DIR__ . '/../model/service.class.php';

class LoginController
{
  public function index()
  {
    $_SESSION['logged'] = false;

    if(isset($_POST['username']) && isset($_POST['password']))
    {
      $username = $_POST['username'];
      $password = $_POST['password'];

      $login_uspio = Service::Login($username, $password);

      if($login_uspio === true)
      {
        $_SESSION['logged'] = true;
        header('Location: index.php?rt=products/index');
      }
      else {
        echo "Prijava neuspješna! Unesite ispravno korisničko ime i lozinku.<br><br>";
        require_once __DIR__ . '/../view/login_index.php';
      }
    }
    else
        require_once __DIR__ . '/../view/login_index.php';

  }

  public function register()
  {
    $_SESSION['logged'] = false;

    if(isset($_POST['username_register']) && isset($_POST['password_register']) && isset($_POST['email_register']))
    {
      $username = $_POST['username_register'];
      $password = $_POST['password_register'];
      $email = $_POST['email_register'];

      $register_uspio = Service::Register($username, $password, $email);

      if($register_uspio == true)
      {
        $_SESSION['logged'] = true;
        header('Location: index.php?rt=products/index');
      }
      else {
        echo "Registracija neuspješna! Unesite drugo korisničko ime ili email adresu.<br><br>";
        require_once __DIR__ . '/../view/login_register.php';
      }
    }
    else {
      require_once __DIR__ . '/../view/login_register.php';
    }
  }

  public function logout()
  {
    $_SESSION['logged'] = false;
    Service::Logout();
    header('Location: index.php');
  }
};


 ?>
