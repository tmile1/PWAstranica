<?php
include 'connect.php';
define('UPLPATH', 'img/');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $about = $_POST['about'];
    $content = $_POST['content'];
    $category = $_POST['category'];
    $archive = isset($_POST['archive']) ? 1 : 0;
    $datum = date('Y-m-d');

    $image = '';
    if (isset($_FILES['pphoto']) && $_FILES['pphoto']['error'] == 0) {
        $image = basename($_FILES['pphoto']['name']);
        move_uploaded_file($_FILES['pphoto']['tmp_name'], 'img/' . $image);
    }

    $query = "INSERT INTO vijesti (datum, naslov, sazetak, tekst, slika, kategorija, arhiva)
              VALUES ('$datum', '$title', '$about', '$content', '$image', '$category', '$archive')";

    $result = mysqli_query($dbc, $query) or die('Greška kod upisa u bazu: ' . mysqli_error($dbc));
    mysqli_close($dbc);

  }
?>

<!DOCTYPE html>
<html lang="hr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pregled</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    include 'header.php';
    ?>

    <main>
      <section class="clanak">
        <p class="clanak_kategorija"><?php echo $category?></p>
        <h1 class="clanak_naslov"><?php echo $title; ?></h1>
        <p class="clanak_datum"><?php echo date('d. m. Y.', strtotime($datum)); ?></p>
        <br />
        <figure>
          <img src="<?php echo UPLPATH . $image; ?>" alt="img" />
        </figure>
        <p class="clanak_sazetak">
          <?php echo $about; ?>
        </p>
        <p class="clanak_tekst">
          <?php echo $content; ?>
        </p>
      </section>
    </main>

    <?php
    include 'footer.php';
    ?>
</body>
</html>