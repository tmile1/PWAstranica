<?php
include 'header.php';

include 'connect.php';
define('UPLPATH', 'img/');

$uspjesnaPrijava = false;
$admin = false;
if (isset($_POST['prijava'])) {
  $prijavaImeKorisnika = $_POST['username'];
  $prijavaLozinkaKorisnika = $_POST['lozinka'];

  $sql = "SELECT korisnicko_ime, lozinka, razina FROM korisnik WHERE korisnicko_ime = ?";
  $stmt = mysqli_stmt_init($dbc);
  if (mysqli_stmt_prepare($stmt, $sql)) {
    mysqli_stmt_bind_param($stmt, 's', $prijavaImeKorisnika);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    mysqli_stmt_bind_result($stmt, $imeKorisnika, $lozinkaKorisnika, $levelKorisnika);
    mysqli_stmt_fetch($stmt);
  }

  if (mysqli_stmt_num_rows($stmt) > 0 && password_verify($prijavaLozinkaKorisnika, $lozinkaKorisnika)) {
    $uspjesnaPrijava = true;
    $_SESSION['username'] = $imeKorisnika;
    $_SESSION['level'] = $levelKorisnika;
    $admin = ($levelKorisnika == 1);
  } else {
    $uspjesnaPrijava = false;
  }
}

if (isset($_POST['delete'])) {
  $id = $_POST['id'];
  $query = "DELETE FROM vijesti WHERE id = ?";
  $stmt = mysqli_prepare($dbc, $query);
  mysqli_stmt_bind_param($stmt, 'i', $id);
  mysqli_stmt_execute($stmt);
}

if (isset($_POST['update'])) {
  $id = $_POST['id'];
  $title = $_POST['title'];
  $about = $_POST['about'];
  $content = $_POST['content'];
  $category = $_POST['category'];
  $archive = isset($_POST['archive']) ? 1 : 0;

  if (!empty($_FILES['pphoto']['name'])) {
    $picture = $_FILES['pphoto']['name'];
    $target = UPLPATH . $picture;
    move_uploaded_file($_FILES["pphoto"]["tmp_name"], $target);
    $query = "UPDATE vijesti SET naslov=?, sazetak=?, tekst=?, slika=?, kategorija=?, arhiva=? WHERE id=?";
    $stmt = mysqli_prepare($dbc, $query);
    mysqli_stmt_bind_param($stmt, 'ssssssi', $title, $about, $content, $picture, $category, $archive, $id);
  } else {
    $query = "UPDATE vijesti SET naslov=?, sazetak=?, tekst=?, kategorija=?, arhiva=? WHERE id=?";
    $stmt = mysqli_prepare($dbc, $query);
    mysqli_stmt_bind_param($stmt, 'ssssii', $title, $about, $content, $category, $archive, $id);
  }
  mysqli_stmt_execute($stmt);
}
?>

<!DOCTYPE html>
<html lang="hr">
<head>
  <meta charset="UTF-8">
  <title>Administracija</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
if ((isset($_SESSION['username']) && $_SESSION['level'] == 1) || ($uspjesnaPrijava && $admin)) {
  $query = "SELECT * FROM vijesti";
  $result = mysqli_query($dbc, $query);
  while ($row = mysqli_fetch_array($result)) {
    echo '<main>';
    echo '<form enctype="multipart/form-data" method="POST">';
    echo '<input type="hidden" name="id" value="' . $row['id'] . '">';

    echo '<label>Naslov:</label><br>'; 
    echo '<input type="text" name="title" value="' . $row['naslov'] . '"><br>';

    echo '<label>Sazetak:</label><br>'; 
    echo '<textarea name="about" rows="5" cols="50" >' . $row['sazetak'] . '</textarea><br>';

    echo '<label>Tekst:</label><br>'; 
    echo '<textarea name="content" rows="8" cols="100">' . $row['tekst'] . '</textarea><br>';

    echo '<label>Slika:</label><br>'; 
    echo '<input type="file" name="pphoto"><br>';
    echo '<img src="img/' . $row['slika'] . '" width="350"><br>';

    echo '<label>Kategorija:</label><br>';
    echo '<select name="category">';
    echo '<option value="vozači"' . ($row['kategorija'] == 'vozači' ? ' selected' : '') . '>vozači</option>';
    echo '<option value="teamovi"' . ($row['kategorija'] == 'teamovi' ? ' selected' : '') . '>teamovi</option>';
    echo '</select><br>';

    echo '<label>Arhiva:</label><input type="checkbox" name="archive"' . ($row['arhiva'] ? ' checked' : '') . '><br><br>';

    echo '<button type="submit" name="update">Izmijeni</button>';
    echo '<button type="submit" name="delete">Izbriši</button>';
    echo '<hr></form>';
    echo '</main>';
  }
} elseif ($uspjesnaPrijava && !$admin) {
  echo '<h2>Bok ' . $imeKorisnika . '! Uspješno ste prijavljeni, ali niste administrator.</h2>';
} elseif (isset($_SESSION['username']) && $_SESSION['level'] == 0) {
  echo '<h2>Bok ' . $_SESSION['username'] . '! Uspješno ste prijavljeni, ali niste administrator.</h2>';
} else {
?>
<main>
<h1>Administracija</h1>
<h2>Prijava korisnika</h2>
<form method="POST">
  <label for="username">Korisničko ime:</label><br>
  <input type="text" name="username"><br>
  <label for="lozinka">Lozinka:</label><br>
  <input type="password" name="lozinka"><br><br>
  <button type="submit" name="prijava">Prijava</button>
</form>
<p>Nemate račun? <a href="registracija.php">Registrirajte se</a></p>
</main>
<?php } ?>
<?php include 'footer.php';?>
</body>
</html>