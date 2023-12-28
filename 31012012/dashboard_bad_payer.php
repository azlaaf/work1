<?php
ob_start();
   
session_start();



include('admin/config.php');
$email=$_SESSION['email'];
ob_end_flush();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>dashbord</title>
    <link rel="stylesheet" href="style-bad-payer.css" />
  </head>
  <body>
    <div class="container">
      <div class="navbar">
        <div class="menu">
          <h3 class="logo">dash<span>bord</span></h3>
          <div class="hamburger-menu">
            <div class="bar"></div>
          </div>
        </div>
      </div>

      <div class="main-container">
        <div class="main">
          <header>
            <div class="overlay">
              <div class="inner">
                <h2 class="title">report bad payer</h2>
                <p>
                to be able to upload a bad payer one has to create a profile.
                </p>
                <button class="btn">Read more</button>
              </div>
            </div>
          </header>
        </div>

        <div class="shadow one"></div>
        <div class="shadow two"></div>
      </div>

      <div class="links">
        <ul>
          <li>
            <a href="#" style="--i: 0.05s;">edit profile</a>
          </li>
          <li>
            <a href="report.php" style="--i: 0.1s;">Report a bad payer</a>
          </li>
          <li>
            <a href="delete_bad_payer.php" style="--i: 0.15s;">Delete a bad payer</a>
          </li>
          <li>
            <a href="research_pad_payer.php" style="--i: 0.2s;">Research</a>
          </li>
          <li>
            <a href="#" style="--i: 0.25s;">About</a>
          </li>
        </ul>
      </div>
    </div>

    <script src="app.js"></script>
  </body>
</html>
