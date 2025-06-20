<?php
  $servername="localhost";
  $username="root";
  $password="";
  $basename="stranica";

  $dbc = mysqli_connect($servername, $username, $password, $basename) or 
  die("Greška kod spajanja na bazu: " . mysqli_connect_error());
  mysqli_set_charset($dbc, "utf8");
?>