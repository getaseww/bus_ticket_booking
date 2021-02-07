<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reserve your bus ticket online</title>
    <link rel="stylesheet" href="bootstrap-4.4.1-dist/css/bootstrap.min.css">
    <script src="bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="nav.css">
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
  <?php
  if (isset($_SESSION['logged'])) {
    echo '<a class="nav-link" href="./user/reservation.php">Reservation</a>';
  }else {
      echo ' <a class="nav-link" href="./user/login.php">Reservation</a>';
  }
  ?>
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
    Menu
  </a>
</div> 
    <section id="banner" class="b">
        <h2>Book Your Bus Ticket Online </h2>
        <?php
            if (isset($_SESSION['logged'])) {
                echo '<a class="btn btn-primary" id="r_btn" href="./user/reservation.php">RESERVE NOW</a>';
            }else {
                echo ' <a class="btn btn-primary" id="r_btn" href="./user/login.php">RESERVE NOW</a>';
            }
        ?>
    </section>
    <section class="description">
        <h2>What Our System offers</h2>
        <div class="row" id="offers">
            <div class="col-lg-4 col-sm-12" id="col">
                <h4>EASY PAYMENT METHOD</h4>
                <p>Our system supports a local internet payment method which is called yenepay.
                   You can make payment from your CBE,amole,hellocash and other payment methods through yenepay.
                </p>
            </div>
            <div class="col-lg-4 col-sm-12">
                <i class="fa fa-clock-o" aria-hidden="true"></i>
                <h4>SAVE YOUR TIME</h4>
                <p>When you use our system you can save your time by booking your bus ticket from your home.
                   Save your time by booking from our system!
                </p>
            </div>

            <div class="col-lg-4 col-sm-12">
                <h4>SAVE YOUR ENERGY</h4>
                <p>If you are tired of a queue to get a bus ticket,This is the right place for you.
                   Book your ticket from our system with out going to the ticket station.
                </p>
            </div>
        </div>
    </section>
    <section class="bus-types">
       <h2>Buses which work with us</h2>
        <div class="row" id="buses">
            <div class="col-lg-4 col-sm-12">
                <div class="card">
                    <img src="images/hab.jpeg" alt=""  id="bus-img">
                </div>
            </div>

            <div class="col-lg-4 col-sm-12">
                <div class="card">
                    <img src="images/oda.jpeg" alt=""  id="bus-img">
                </div>
            </div>

            <div class="col-lg-4 col-sm-12">
                <div class="card">
                    <img src="images/bd.jpeg" alt=""  id="bus-img">
                </div>
            </div>
        </div>

        <div class="row" style="padding-top:30px" id="buses">
            <div class="col-lg-4 col-sm-12">
                <div class="card">
                    <img src="images/s.jpg" alt=""  id="bus-img">
                </div>
            </div>

            <div class="col-lg-4 col-sm-12">
                <div class="card">
                    <img src="images/yegna.jpg" alt="" style="height:200px" id="bus-img">
                </div>
            </div>

            <div class="col-lg-4 col-sm-12">
                <div class="card">
                    <img src="images/abay.jpeg" alt=""  id="bus-img">
                </div>
            </div>
        </div>

    </section>
    <?php
       include "include/footer.php";
    ?>
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
