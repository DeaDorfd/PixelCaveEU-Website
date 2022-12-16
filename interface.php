<?php

include 'config.php';

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: shop/");
}

$username = $_SESSION['username'];

$sql = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$admin = $row['Admin'];

///if(!$admin) {
///    header("Location: index.php");
///}

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PixelCave Interface</title>
    <link rel="stylesheet" type="text/css" href="css/interface.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="img/pixel.png">
  </head>
  <body>
    <div class="sidebar">
      <div class="logo_content">
        <div class="logo">
          <i class='bx bxl-c-plus-plus'></i>
          <div class="logo_name">PixelCave</div>
        </div>
        <i class='bx bx-menu' id="btn"></i>
      </div>
      <ul class="nav_list">
        <li>
            <i class='bx bx-search' ></i>
            <input type="text" placeholder="Search...">
          <span class="tooltip">Search</span>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
          <span class="tooltip">Dashboard</span>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-user' ></i>
            <span class="links_name">User</span>
          </a>
          <span class="tooltip">User</span>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-chat' ></i>
            <span class="links_name">Message</span>
          </a>
          <span class="tooltip">Message</span>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-pie-chart-alt-2' ></i>
            <span class="links_name">Analythics</span>
          </a>
          <span class="tooltip">Analythics</span>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-folder' ></i>
            <span class="links_name">File Manager</span>
          </a>
          <span class="tooltip">Files</span>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-cart' ></i>
            <span class="links_name">Order</span>
          </a>
          <span class="tooltip">Order</span>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-heart' ></i>
            <span class="links_name">Saved</span>
          </a>
          <span class="tooltip">Saved</span>
        </li><li>
          <a href="#">
            <i class='bx bx-cog' ></i>
            <span class="links_name">Settings</span>
          </a>
          <span class="tooltip">Settings</span>
        </li>
      </ul>
      <div class="profile_content">
        <div class="profile">
          <div class="profile_details">
            <img src="img/pixel.png" alt="IMG Error">
            <div class="name_job">
              <div class="name"><?=$username;?></div>
              <div class="job">Web Designer</div>
            </div>
          </div>
          <i class='bx bx-log-out' id="log_out"></i>
        </div>
      </div>
    </div>
    <div class="home_content">
      <div class="text">Home Content</div>
    </div>
    <script>
      let btn = document.querySelector("#btn");
      let sidebar = document.querySelector(".sidebar");
      let searchbtn = document.querySelector(".bx-search");
      let logoutbtn = document.querySelector(".bx-log-out");

      btn.onclick = function() {
        sidebar.classList.toggle("active")
      }
      searchbtn.onclick = function() {
        sidebar.classList.toggle("active")
      }
      logoutbtn.onclick = function() {
        window.location.href = "logout.php";
      }
    </script>
  </body>
</html>
