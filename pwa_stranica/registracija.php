<?php
include 'connect.php';

$poruka = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $korisnicko_ime = $_POST['username'];
  $lozinka = $_POST['lozinka'];
  $lozinka2 = $_POST['lozinka2'];

  if ($lozinka !== $lozinka2) {
    $poruka = "Lozinke se ne podudaraju.";
  } else {
    $lozinka_hash = password_hash($lozinka, CRYPT_BLOWFISH);

    $sql = "INSERT INTO korisnik (korisnicko_ime, lozinka) VALUES (?, ?)";
    $stmt = mysqli_stmt_init($dbc);
    if (mysqli_stmt_prepare($stmt, $sql)) {
      mysqli_stmt_bind_param($stmt, 'ss', $korisnicko_ime, $lozinka_hash);
      mysqli_stmt_execute($stmt);
      $poruka = "Registracija uspješna!<br><a href='administracija.php'>Prijavi se</a>";
    } else {
      $poruka = "Korisničko ime je već zauzeto ili došlo je do pogreške.";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="hr">
<head>
  <meta charset="UTF-8">
  <title>Registracija</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'header.php';?>

<main>
<h1>Registracija korisnika</h1>
<form method="POST">
  <label for="username">Korisničko ime:</label><br>
  <input type="text" name="username" required><br>

  <label for="lozinka">Lozinka:</label><br>
  <input type="password" name="lozinka" required><br>

  <label for="lozinka2">Ponovi lozinku:</label><br>
  <input type="password" name="lozinka2" required><br><br>

  <button type="submit">Registriraj se</button>
</form>
<p><?php echo $poruka; ?></p>
</main>
<?php include 'footer.php';?>
</body>
</html>
