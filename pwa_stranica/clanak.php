<?php
include 'connect.php';
define('UPLPATH', 'img/');

$id = $_GET['id'];

$query = "SELECT * FROM vijesti WHERE id=$id";
$resault = mysqli_query($dbc, $query);

$row = mysqli_fetch_array($resault);
?>
<!DOCTYPE html>
<html lang="hr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Članak</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <?php
    include 'header.php';

    if(mysqli_num_rows($resault) == 0){
      echo "<p>Članak nije pronađen.</p>";
      mysqli_close($dbc);
    }
    ?>

    <main>
      <section class="clanak">
        <p class="clanak_kategorija"><?php echo ucfirst($row['kategorija']); ?></p>
        <h1 class="clanak_naslov"><?php echo $row['naslov']; ?></h1>
        <p class="clanak_datum"><?php echo date('d. m. Y.', strtotime($row['datum'])); ?></p>
        <br />
        <figure>
          <img src="<?php echo UPLPATH . $row['slika']; ?>" alt="img" />
        </figure>
        <p class="clanak_sazetak">
          <?php echo $row['sazetak']; ?>
        </p>
        <p class="clanak_tekst">
          <?php echo nl2br($row['tekst']); ?>
        </p>
      </section>
    </main>

  <?php include 'footer.php'; ?>
  </body>
</html>
