<?php
session_start();

$Name = "";

if (!isset($_SESSION['username'])) {
    $Name = "Login";
} else {
  $Name = $_SESSION['username'];
}
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PixelCave Website</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="img/pixel.png">
  </head>
  <body>

    <!-- Header----->
    <!--<h1> Willkommen <?=$_SESSION['username']; ?>, Dein Geld: <?=$_SESSION['money']; ?> </h1>--->

    <header>
      <div id="logo">
        <a href="#">
          <img src="img/pixel.png" alt="Logo Error">
        </a>
      </div>
      <div id="name">
        <p>PixelCaveEU</p>
      </div>
      </div>
        <nav id="main-nav">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
          <ul>
            <a href="#home"><li>Home</li></a>
            <a href="#about"><li>Über uns</li></a>
            <a href="#work"><li>Unser Server</li></a>
            <a href="#contact"><li>Contact</li></a>
            <a href="/login/login.php"><li><?=$Name?></li></a>
          </ul>
        </nav>
    </header>

    <!-- Home ---->

    <section id="home">
      <hr>
      <h1>PixelCave.eu</h1>
      <h2>Your idea, we program</h2>
      <a href="#work">
      <svg xmlns="http://www.w3.org/2000/svg" width="30" height="50" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <circle cx="12" cy="12" r="10"/><path d="M16 12l-4 4-4-4M12 8v7"/></svg>
      </a>
    </section>

    <!-- About ---->

    <section id="about">
      <h3>Über uns</h3>
      <hr>
      <img src="img/pixel.png" alt="Avatar Error">
      <h4>PixelCave Network</h4>
      <p>Hey Willkommen auf PixelCave.eu. Wir stehen für unsere einzigartigkeit unserer spielmodies</p>
    </section>

    <!-- Server ---->

    <section id="work">
      <h3>Unser Server</h3>
      <hr>
      <div id="projects">
        <ul>
          <li><a href="https://pixelcave.eu"><img src="img/projekt_01.png" alt="Projekt_01"></a></li>
          <li><a href="#"><img src="img/projekt_02.png" alt="Projekt_02"></a></li>
          <li><a href="#"><img src="img/projekt_03.png" alt="Projekt_03"></a></li>
          <li><a href="#"><img src="img/projekt_04.png" alt="Projekt_04"></a></li>
          <li><a href="#"><img src="img/projekt_05.png" alt="Projekt_05"></a></li>
          <li><a href="#"><img src="img/projekt_06.png" alt="Projekt_06"></a></li>
        </ul>
      </div>

    </section>

    <!-- Contact --->

    <section id="contact">
      <h3>Contact</h3>
      <hr>
      <form>
        <input class="input_text" type="email" tabindex="1" placeholder="E-Mail"><br>
        <input class="input_text" type="text" tabindex="2" placeholder="Betreff"><br>
        <textarea class="input_text" tabindex="3" placeholder="Nachricht"></textarea><br>
        <input class="button" type="submit">
      </form>
    </section>

    <!-- Footer --->

    <footer>
      <p><a href="impressum.html">Impressum</a>  |  <a href="">Datenschutz</a></p>
      <p>
        &copy; 2019-2021 PixelCaveEU
      </p>
    </footer>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <script>
    $(document).ready(function() {
      $("#main-nav svg").on("click", function() {
          $("header nav ul").toggleClass("open");
      });
    });
    </script>
  </body>
</html>
