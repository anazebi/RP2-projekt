<?php
require_once __DIR__ . '/_headerNav.php';
?>

<div class="podnaslov">
    <?php

    if($imeTrgovine !== "")

        echo '<h2>Dobrodošli u  <strong style="color:DarkGreen">' . $imeTrgovine . '</strong> online-prodavaonicu!</h2>';
        echo '<a href="index.php?rt=stores/sviNaAkciji&imeTrgovine=' . $imeTrgovine . '" >';
        echo '<p><br> Prikaži proizvode na ovotjednoj akciji' . ' </p>';
        echo '</a>';
        echo '<a href="index.php?rt=stores/sviProizvodi&imeTrgovine=' . $imeTrgovine.'" >';
        echo '<p> Pregledaj sve proizvode u prodavaonici'. '</p><br>';
        echo '</a>';
        if($ocjena !== 0)
            echo 'Prosječna ocjena kupaca: <strong style="color:YellowGreen">' . $ocjena . '</strong><br>';
        else echo 'Ova trgovina još nema recenzija!'
    ?>
</div>
<?php

if($ocjena !== 0)
{ ?>
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

if(isset($_SESSION['logged']))
{
  if($_SESSION['logged'] === true)
  {

  }
}

?>
