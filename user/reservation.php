<?session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
        echo '<a class="navbar-brand" href="index.php">OBT</a>';
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
require_once "login_session.php";
if (isset($_SESSION['form_error'])) {
    echo '<p style="color:red">';
    echo $_SESSION['form_error'];
    echo '</p>';
    unset($_SESSION['form_error']);
}
if (isset($_SESSION['no_route'])) {
    echo '<p style="color:red">';
    echo $_SESSION['no_route'];
    echo '</p>';
    unset($_SESSION['no_route']);
}
echo '
<div class="reservation-form" style="margin:30px">
   <h3 style="text-align:center;padding-bottom:30px;">RESERVE YOUR BUS TICKET NOW</h3>
    <form method="POST" action="submit-reservation.php"  class="login-form">
        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <label for="fname">First Name</label>
                    <input type="text" name="fname"  class="form-control" id="fname">
                </div>
                <div class="form-group">
                    <label for="lname">Last Name</label>
                    <input type="text" name="lname" class="form-control" id="lname">
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" name="phone" class="form-control" id="phone">
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="date">Departure Date</label>
                    <input type="date" name="date" class="form-control" id="date">
                </div>
                <div class="form-group">
                    <label for="origin">Origin Location</label>
                    <select id="origin" name="origin" class="form-control">
                        <option selected>Adis Abeba</option>
                        <option>Adama</option>
                        <option>Bahirdar</option>
                        <option>Hawasa</option>
                        <option>Desie</option>
                        <option>Nekemt</option>
                        <option>Wolkite</option>
                        <option>Jigjiga</option>
                        <option>Mekele</option>
                        <option>Gonder</option>
                        <option>Debre Markos</option>
                        <option>Aksum</option>
                        <option>Ambo</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="destination">Destination Location</label>
                    <select id="destination" name="destination" class="form-control">
                        <option selected>Adis Abeba</option>
                        <option>Adama</option>
                        <option>Bahirdar</option>
                        <option>Hawasa</option>
                        <option>Desie</option>
                        <option>Nekemt</option>
                        <option>Wolkite</option>
                        <option>Jigjiga</option>
                        <option>Mekele</option>
                        <option>Gonder</option>
                        <option>Debre Markos</option>
                        <option>Aksum</option>
                        <option>Ambo</option>
                    </select>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" class="form-control" id="address">
                </div>
                <div class="form-group">
                    <label for="set_number">Set Number</label>
                    <input type="text" class="form-control" name="set_number" id="set_number">
                </div>
                <div class="form-group">
                    <label for="bus_type">Bus Type</label>
                    <select id="bus_type" name="bus_type" class="form-control">
                        <option selected>Habesha Bus</option>
                        <option>Golden Bus</option>
                        <option>FM bus</option>
                        <option>Africa bus</option>
                        <option>Dearliner bus</option>
                        <option>Selam bus</option>
                        <option>Odda bus</option>
                    </select>
                </div>
            </div>
        </div>
        <button type="submit" name="login" class="btn btn-primary" style="margin-left:500px;">Submit</button>
    </form>
</div>';

require_once("../include/footer.php");
?>