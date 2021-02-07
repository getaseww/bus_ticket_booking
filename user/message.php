<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Message</title>
    <link rel="stylesheet" href="../bootstrap-4.4.1-dist/css/bootstrap.min.css">
    <script src="../bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../nav.css">
</head>
<body>
 
<div class="topnav" id="myTopnav">
    <?php
      if(isset($_SESSION['is_admin'])){
        echo '<a class="navbar-brand" href="../admin/dashboard.php">Dashboard</a>';
      }
      else if(isset($_SESSION['logged'])){
        echo '<a class="navbar-brand" href="dashboard.php">Dashboard</a>';
      }else {
        echo '<a class="navbar-brand" href="../index.php">OBT</a>';
      } 
   ?>
  <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
  <a class="nav-link" href="reservation.php">Reservation</a>
  <a class="nav-link" href="message.php">message</a>
  <?php
      if(isset($_SESSION['logged'])){
        echo '<a class="nav-link" href="logout.php" id="r">Logout</a>';
      }else {
        echo '<a class="nav-link" href="register.php" id="r">Register</a>
            <a class="nav-link" href="login.php" id="r">Login</a>';
      }
      
  ?>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>Menu
  </a>
</div> 
<div class="row">
    <div class="col-lg-2 col-sm-2">
    </div>
    <div class="col-lg-8 col-sm-8">
        <form method="POST" action="submit-message.php"  class="register-form">
            <h4 class="">Send your message</h4>
            <div class="form-group">
                <textarea name="body" id="body" cols="40" rows="5"></textarea>
                <?php
                  if (isset($_SESSION['body_empty'])) {
                    echo '<p style="color:red">';
                    echo $_SESSION['body_empty'];
                    echo '</p>';
                    unset($_SESSION['body_empty']);
                }
                ?>
            </div>
            <button type="submit" name="message" class="btn btn-primary" id="mess-send">Send</button>
        </form>
    </div>
    <div class="col-lg-2 col-sm-2">
    </div>
</div>
<?php
include "../include/footer.php";
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