<?php
include 'connect.php';
define('UPLPATH', 'img/');
$kategorija = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="hr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kategorija</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <?php
  include 'header.php';
  ?>
  
  <main>
    <h2><?php echo ucfirst($kategorija); ?></h2>
    <section>
      <?php
    $query = "SELECT * FROM vijesti WHERE kategorija='$kategorija' AND arhiva=1 ORDER BY datum DESC";
    $result = mysqli_query($dbc, $query);
    
    while($row = mysqli_fetch_array($result)) {
      echo '<article>';
      echo '<img src="' . UPLPATH . $row['slika'] . '" alt="F1">';
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