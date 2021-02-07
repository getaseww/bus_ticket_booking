<?php
require_once '../user/login_session.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin dashboard</title>

    <link rel="stylesheet" href="../bootstrap-4.4.1-dist/css/bootstrap.min.css">
    <script src="../bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../nav.css">
    <!-- internal css -->
    <style>
      #dash{
          margin:20px;
      }
    </style>
</head>
<body>     
<div class="topnav" id="myTopnav">
  <a class="navbar-brand" href="dashboard.php">Dashboard</a>
  <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
  <a class="nav-link" href="../user/reservation.php">Reservation</a>
  <a class="nav-link" href="messages.php">Messages</a>
  <a class="nav-link" href="route.php">Route</a>
  <?php
      if(isset($_SESSION['logged'])){
        echo '<a class="nav-link" href="../user/logout.php" id="r">Logout</a>';
      }else {
        echo '<a class="nav-link" href="../user/register.php" id="r">Register</a>
            <a class="nav-link" href="../user/login.php" id="r">Login</a>';
      }
      
  ?>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>Menu
  </a>
</div> 
<?php
$conn=mysqli_connect("localhost","root","","online_ticket");
$result=$conn->query("SELECT * FROM message");
if ($result->num_rows>0) {
   echo '<h3 style="text-align:center">Messages</h3>';
   while($row=$result->fetch_array()){
       $result2=$conn->query("SELECT * FROM user");
       while($row2=$result2->fetch_array()){
           if ($row['user_id']==$row2['id']) {
               $fname=$row2['fname'];
               $email=$row2['email'];
           }
       }
       echo '
            <div>
                <h6 style="margin-left:50px;margin-top:50px">From: ';echo $fname; echo '</h6>';
               echo '<p style="margin-left:50px">E-mail: '; echo $email; echo '</p>';
               echo '<p style="margin-left:50px">';echo $row['body']; echo '</p>
            </div>'; 
       echo '<hr>';
   }
}
?>
<!-- footer -->
<?php include_once "../include/footer.php"?>
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