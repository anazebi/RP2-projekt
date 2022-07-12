<?php
require_once __DIR__ . '/_headerNav.php';
?>

<div class = "storeinfo">
    <?php

    if($imeTrgovine !== "")

        echo '<h2>Dobrodošli u  <strong style="color:DarkGreen">' . $imeTrgovine . '</strong> online-prodavaonicu!</h2>';
        echo '<hr>';
        if($ocjena !== 0)
            echo '<h3>Prosječna ocjena kupaca: <strong style="color:YellowGreen">' . $ocjena . '</strong></h3>';
        else echo 'Ova trgovina još nema recenzija!';
        echo '<a href="index.php?rt=stores/sviNaAkciji&imeTrgovine=' . $imeTrgovine . '" ><br>';
        echo '<p> Prikaži proizvode na ovotjednoj akciji' . ' </p>';
        echo '</a>';
        echo '<a href="index.php?rt=stores/sviProizvodi&imeTrgovine=' . $imeTrgovine.'" >';
        echo '<p> Pregledaj sve proizvode u prodavaonici'. '</p><br>';
        echo '</a>';
    ?>
<?php

if($ocjena !== 0)
{
  // za svaku trgovinu korisniku dajemo neke informacije kao sto su prosjecna ocjena korisnika ili pak recenzije korsinika
  ?>
  <h3> Iskustva kupaca: </h3>
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
    </p>
  <?php
  }
}

if (session_status() === PHP_SESSION_NONE) session_start();

//ako je korisnik prijavljen onda moze recenzirati trgovinu
?>
<br>
<h3> Dodaj vlastitu recenziju: </h3>
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
        <td> <textarea name="review" rows="2" cols="50"></textarea> </td>
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
    <p>Prijavi se!</p>
  </a>
<?php
}

 require_once __DIR__ . '/_footer.php'
 ?>
</div>
