<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact</title>

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

<section id="contact-a">
    <div class="container">
        
        <form method="POST" action="submit-contact.php">
        <div class="row">
           <div class="col-lg-2 col-sm-1"></div>
           <div class="col-lg-8 col-sm-10">
           <h2 class="section-tile">Contact Us</h2>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name">
                    
                    <?php
                        if (isset($_SESSION['name_empty'])) {
                            echo '<p style="color:red">';
                            echo $_SESSION['name_empty'];
                            echo '</p>';
                            unset($_SESSION['name_empty']);
                        }
                    ?>
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="text" name="email" class="form-control" id="email">
                    <?php
                    if (isset($_SESSION['email_empty'])) {
                        echo '<p style="color:red">';
                        echo $_SESSION['email_empty'];
                        echo '</p>';
                        unset($_SESSION['email_empty']);
                    }
                ?>
                </div>
                <div class="form-group">
                    <label for="message">Your Message</label>
                    <textarea type="text" name="message" col="5" row="20" class="form-control" ></textarea>
                    <?php
                        if (isset($_SESSION['message_empty'])) {
                            echo '<p style="color:red">';
                            echo $_SESSION['message_empty'];
                            echo '</p>';
                            unset($_SESSION['message_empty']);
                        }
                    ?>
                </div>
                <button type="submit" name="contact" class="btn btn-primary" id="contact-btn">Submit</button>
           </div>
           <div class="col-lg-2 col-sm-1"></div>
        </div>
        </form>
    </div>
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

