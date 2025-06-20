<?php
include 'connect.php';
define('UPLPATH', 'img/');
?>

<!DOCTYPE html>
<html lang="hr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>F1 Express</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <?php
    include 'header.php';
    ?>

    <main>
      <h2>Vozači</h2>
      <section>
        <?php 
          $query = "SELECT * FROM vijesti WHERE arhiva=0 AND kategorija='vozači' ORDER BY datum DESC LIMIT 4";
          $resault = mysqli_query($dbc, $query);
          while($row = mysqli_fetch_array($resault)){
            echo '<article>';
            echo '<img src="' . UPLPATH . $row['slika'] . '">';
            echo '<h3><a href="clanak.php?id=' . $row['id'] . '">' . $row['naslov'] . '</a></h3>';
            echo '<p>' . $row['sazetak'] . '</p>';
            echo '</article>';
          }
        ?>
      </section>

      <h2>Teamovi</h2>
      <section>
        <?php 
          $query = "SELECT * FROM vijesti WHERE arhiva=0 AND kategorija='teamovi' ORDER BY datum DESC LIMIT 4";
          $resault = mysqli_query($dbc, $query);
          while($row = mysqli_fetch_array($resault)){
            echo '<article>';
            echo '<img src="' . UPLPATH . $row['slika'] . '">';
            echo '<h3><a href="clanak.php?id=' . $row['id'] . '">' . $row['naslov'] . '</a></h3>';
            echo '<p>' . $row['sazetak'] . '</p>';
            echo '</article>';
          }
        ?>
      </section>
    </main>

    <?php
    include 'footer.php';
    ?>
  </body>
</html>
