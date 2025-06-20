<!DOCTYPE html>
<html lang="hr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Unos</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <?php
    include 'header.php';
    ?>

    <main>
      <h2>Unos nove vijesti</h2>
      <br />
      <form action="skripta.php" method="POST" enctype="multipart/form-data">
        <label for="title">Naslov vijesti:</label><br />
        <input type="text" name="title" id="title" />
        <p id="porukaTitle"></p>
        <br /><br />

        <label for="about">Kratki sažetak:</label><br />
        <textarea name="about" rows="4" cols="50" id="about"></textarea>
        <p id="porukaAbout"></p>
        <br /><br />

        <label for="content">Tekst vijesti:</label><br />
        <textarea name="content" rows="6" cols="50" id="content"></textarea>
        <p id="porukaContent"></p>
        <br /><br />

        <label for="category">Kategorija:</label><br />
        <select name="category" id="category">
          <option value="vozači">vozači</option>
          <option value="teamovi">teamovi</option>
        </select>
        <p id="porukaKategorija"></p>
        <br /><br />

        <label for="pphoto">Odaberi sliku:</label><br />
        <input type="file" name="pphoto" accept="image/*" id="pphoto"/><br /><br />
        <p id="porukaSlika"></p>

        <label for="archive">Arhiva:</label>
        <input type="checkbox" name="archive" /><br /><br />

        <button type="reset">Poništi</button>
        <button type="submit" id="slanje">Pošalji</button>
      </form>
    </main>

    <?php
    include 'footer.php';
    ?>

    <script>
      document.querySelector("form").addEventListener("submit", function(event) {
        let slanjeForme = true;

        let title = document.getElementById("title");
        if (title.value.length < 5 || title.value.length > 30) {
          slanjeForme = false;
          title.style.border = "1px dashed red";
          document.getElementById("porukaTitle").innerHTML = "Naslov mora imati 5–30 znakova.";
        } else {
          title.style.border = "1px solid green";
          document.getElementById("porukaTitle").innerHTML = "";
        }

        let about = document.getElementById("about");
        if (about.value.length < 10 || about.value.length > 100) {
          slanjeForme = false;
          about.style.border = "1px dashed red";
          document.getElementById("porukaAbout").innerHTML = "Sažetak mora imati 10–100 znakova.";
        } else {
          about.style.border = "1px solid green";
          document.getElementById("porukaAbout").innerHTML = "";
        }

        let content = document.getElementById("content");
        if (content.value.trim() === "") {
          slanjeForme = false;
          content.style.border = "1px dashed red";
          document.getElementById("porukaContent").innerHTML = "Tekst mora biti unesen.";
        } else {
          content.style.border = "1px solid green";
          document.getElementById("porukaContent").innerHTML = "";
        }

        let pphoto = document.getElementById("pphoto");
        if (pphoto.value === "") {
          slanjeForme = false;
          pphoto.style.border = "1px dashed red";
          document.getElementById("porukaSlika").innerHTML = "Slika mora biti odabrana.";
        } else {
          pphoto.style.border = "1px solid green";
          document.getElementById("porukaSlika").innerHTML = "";
        }

        let category = document.getElementById("category");
        if (category.value === "") {
          slanjeForme = false;
          category.style.border = "1px dashed red";
          document.getElementById("porukaKategorija").innerHTML = "Odaberite kategoriju.";
        } else {
          category.style.border = "1px solid green";
          document.getElementById("porukaKategorija").innerHTML = "";
        }

        if (!slanjeForme) {
          event.preventDefault();
        }
      });
    </script>
  </body>
</html>
