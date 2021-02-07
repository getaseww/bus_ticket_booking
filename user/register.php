<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>

    <link rel="stylesheet" href="../bootstrap-4.4.1-dist/css/bootstrap.min.css">
    <script src="../bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../nav.css">
    <style>
      .row{
        padding-top:30px;
      }
    </style>
</head>
<body>
 
<div class="topnav" id="myTopnav">
    <?php
      if(isset($_SESSION['is_admin'])){
        echo '<a class="navbar-brand" href="admin/dashboard">Dashboard</a>';
      }
      else if(isset($_SESSION['logged'])){
        echo '<a class="navbar-brand" href="user/dashboard">Dashboard</a>';
      }else {
        echo '<a class="navbar-brand" href="../index.php">OBT</a>';
      } 
   ?>
  <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
  <a class="nav-link" href="reservation.php">Reservation</a>
  <a class="nav-link" href="../about.php">About</a>
  <a class="nav-link" href="../contact.php">Contact</a>
  <?php
      if(isset($_SESSION['logged'])){
        echo '<a class="nav-link" href="user/logout.php" id="r">Logout</a>';
      }else {
        echo '<a class="nav-link" href="register.php" id="r">Register</a>
            <a class="nav-link" href="login.php" id="r">Login</a>';
      }
      
  ?>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    Menu
  </a>
</div> 
<div class="row">
    <div class="col-lg-4 col-sm-12">
    </div>
    <div class="col-lg-4 col-sm-12" style="padding-left:30px;">
        <form method="POST" action="submit-registeration.php"  class="register-form">
            <h4 class="">Register</h4>
            <div class="form-group">
                <label for="fname">First Name</label>
                <input type="text" name="fname" class="form-control" id="fname">
                <?php
                  if (isset($_SESSION['fname_empty'])) {
                    echo '<p style="color:red">';
                    echo $_SESSION['fname_empty'];
                    echo '</p>';
                    unset($_SESSION['fname_empty']);
                }
                ?>
            </div>
            <div class="form-group">
                <label for="lname">Last Name</label>
                <input type="text" name="lname" class="form-control" id="lname">
                <?php
                  if (isset($_SESSION['lname_empty'])) {
                    echo '<p style="color:red">';
                    echo $_SESSION['lname_empty'];
                    echo '</p>';
                    unset($_SESSION['lname_empty']);
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
                if (isset($_SESSION['email_exists'])) {
                    echo '<p style="color:red">';
                    echo $_SESSION['email_exists'];
                    echo '</p>';
                    unset($_SESSION['email_exists']);
                }
                ?>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password">
                <?php
                  if (isset($_SESSION['password_empty'])) {
                    echo '<p style="color:red">';
                    echo $_SESSION['password_empty'];
                    echo '</p>';
                    unset($_SESSION['password_empty']);
                }
                ?>
            </div>
            <div class="form-group">
                <label class="form-check-label" for="remember">Already have an account? <a href="login.php">Login</a></label>
            </div>
            <button type="submit" name="register" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <div class="col-lg-4 col-sm-12">
    </div>
</div>
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
<?php
include "../include/footer.php";
?>
