<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About Us</title>

    <link rel="stylesheet" href="bootstrap-4.4.1-dist/css/bootstrap.min.css">
    <script src="bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="nav.css">
    <!-- internal css -->
    <style>
      #dash{
          margin:20px;
      }
    </style>
</head>
<body> 
<div class="topnav" id="myTopnav">
    <?php
      if(isset($_SESSION['is_admin'])){
        echo '<a class="navbar-brand" href="./admin/dashboard.php">Dashboard</a>';
      }
      else if(isset($_SESSION['logged'])){
        echo '<a class="navbar-brand" href="./user/dashboard.php">Dashboard</a>';
      }else {
        echo '<a class="navbar-brand" href="index.php">OBT</a>';
      } 
   ?>
  <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
  <a class="nav-link" href="./user/reservation.php">Reservation</a>
  <a class="nav-link" href="about.php">About</a>
  <a class="nav-link" href="contact.php">Contact</a>
  <?php
      if(isset($_SESSION['logged'])){
        echo '<a class="nav-link" href="./user/logout.php" id="r">Logout</a>';
      }else {
        echo '<a class="nav-link" href="./user/register.php" id="r">Register</a>
            <a class="nav-link" href="./user/login.php" id="r">Login</a>';
      }
      
  ?>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>Menu
  </a>
</div>
<section>
    <h2 style="margin:20px; text-align:center">About Us</h2>
    <p style="margin-left:100px;margin-right:100px;text-align:center;text-size:18px"> OBT is a online bus ticket reservation system.
You can now choose your bus and your seat easily, and got your ticket with online payments.
</p>
</section>
<!-- footer -->
<?php include_once "include/footer.php"?>
<script>
      function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
          x.className += " responsive";
        } else {
          x.className = "topnav";
        }
      }
    </script>
</body>
</html>

