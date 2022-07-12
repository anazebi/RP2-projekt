<?php
require_once __DIR__ . '/_headerNav.php';
?>

<div class = "storeinfo">
    <?php

    if($imeTrgovine !== "")

        echo '<h2>Dobrodošli u  <strong style="color:DarkGreen">' . $imeTrgovine . '</strong> online-prodavaonicu!</h2>';
        echo '<hr>';
        if($ocjena !== 0)
            echo '<h3 style="display:inline-block">Prosječna ocjena kupca: <strong style="color:YellowGreen">' . $ocjena . '</strong></h3>';
        else echo 'Ova trgovina još nema recenzija!';
        echo '<a href="index.php?rt=stores/sviNaAkciji&imeTrgovine=' . $imeTrgovine . '" >';
        echo '<button class = "trgovina"> Prikaži proizvode na ovotjednoj akciji' . ' </button>';
        echo '</a>';
        echo '<a href="index.php?rt=stores/sviProizvodi&imeTrgovine=' . $imeTrgovine.'" >';
        echo '<button class = "trgovina"> Pregledaj sve proizvode u prodavaonici'. '</button>';
        echo '</a>';
        echo '<hr>';
        echo '<br>';
    ?>
<?php

if($ocjena !== 0)
{
  // za svaku trgovinu korisniku dajemo neke informacije kao sto su prosjecna ocjena korisnika ili pak recenzije korsinika
  ?>
  <h4 style="color:DarkGreen"> ISKUSTVA KUPACA: </h4>
  <hr>
  <?php
  foreach ($sveRecenzije as $recenzija) {
    $reviewbyid = $recenzija->user_id;
    $comment = $recenzija->comment;
    $rating = $recenzija->rating;
    $reviewby = Service::getUserById($reviewbyid);
    $username = $reviewby->username;
    ?>

    <p>
    <table>
      <th style="text-align: left;">  Iskustvo korisnika: <?php echo $username; ?>  </th>
      <tr>
        <td> Komentar: <?php echo $comment; ?> </td>
      </tr>
      <tr>
        <td> Ocjena: <?php echo $rating; ?> </td>
      </tr>
    </table>
    <hr>
    </p>
  <?php
  }
}

if (session_status() === PHP_SESSION_NONE) session_start();

//ako je korisnik prijavljen onda moze recenzirati trgovinu
?>
<br>
<h4 style="color:DarkGreen"> DODAJ VLASTITU RECENZIJU: </h4>
<hr>
<?php
if(isset($_SESSION['logged']))
{
  if($_SESSION['logged'] === true)
  { ?>
    <form action="index.php?rt=reviews/index&imeTrgovine=<?php echo $imeTrgovine; ?>" method="post">
    <p>Ocijenite trgovinu:
    <select name="rating" id = "rating">
      <option value="1"> 1 </option>
      <option value="2"> 2 </option>
      <option value="3"> 3 </option>
      <option value="4"> 4 </option>
      <option value="5"> 5 </option>
    </select>
    </p>
    <p>Opišite svoje iskustvo: </p>
    <table>
      <tr>
        <td> <textarea name="review" rows="3" cols="50" id="review_text"></textarea> </td>
        <td> <button type="submit" id="review_button"> Objavi recenziju </button> </td>
      </tr>
    </table>
    </form>
    <?php
  }
  else { ?>
    <a href="index.php?rt=login/index">
      <p>Prijavi se!</p>
    </a>
<?php
  }
}
else { ?>
  <a href="index.php?rt=login/index">
    <button id = "signin3">Prijavi se!</button>
  </a>
<?php
}

 require_once __DIR__ . '/_footer.php'
 ?>
</div>
