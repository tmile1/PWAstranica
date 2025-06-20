<?php session_start(); ?>

<header>
      <h1>F1 Express</h1>

      <nav>
        <ul>
          <li><a href="index.php">Naslovnica</a></li>
          <li><a href="kategorija.php?id=vozači">Vozači</a></li>
          <li><a href="kategorija.php?id=teamovi">Teamovi</a></li>
          <li><a href="administracija.php">Administracija</a></li>
          <li><a href="unos.php">Unos</a></li>
          <?php 
            if (isset($_SESSION['username'])) {
              echo '<li><a href="logout.php">Odjava (' . htmlspecialchars($_SESSION['username']) . ')</a></li>';
            } else {
              echo '<li><a href="registracija.php">Registracija</a></li>';
            }
          ?>
        </ul>
      </nav>
      <div></div>
</header>