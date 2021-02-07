<?php
require_once 'login_session.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User dashboard</title>

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
  <a class="nav-link" href="reservation.php">Reservation</a>
  <a class="nav-link" href="message.php">message</a>
  <?php
      if(isset($_SESSION['logged'])){
        echo '<a class="nav-link" href="logout.php" id="r">Logout</a>';
      }else {
        echo '<a class="nav-link" href="user/register.php" id="r">Register</a>
            <a class="nav-link" href="user/login.php" id="r">Login</a>';
      }
      
  ?>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>Menu
  </a>
</div> 
    <div class="dash" id="dash">
      <table class="table table-responsive-lg table-secondary" id="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Origin Location</th>
                <th>Destination Location</th>
                <th>Departure Date</th>
                <th>Bus Type</th>
                <th>Set Number</th>
                <th>Status</th>
            </tr>
        </thead>
        <?php
            $conn=mysqli_connect("localhost","root","","online_ticket");
            $result=$conn->query("SELECT * FROM reservation");
            if ($result->num_rows>0) {
                while($row=$result->fetch_array()){
                    if ($_SESSION['user_id']==$row['user_id']) {
                      echo "<tr>
                                <td>" .$row['id']."</td>
                                <td>" . $row['fname']."</td>
                                <td>" . $row['phone']."</td>
                                <td>" . $row['origin']."</td>
                                <td>" . $row['destination']."</td>
                                <td>" . $row['date']."</td>
                                <td>" . $row['bus_type']."</td>
                                <td>" . $row['set_number']."</td>";
                                if ($row['status']=='pending') {
                                  echo '<td>
                                          <button type="button" class="btn btn-primary">Pending
                                           <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                         </button>
                                        </td>';

                                }else {
                                  echo '<td>
                                  <button type="button" class="btn btn-success">Approved
                                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                  </button></td>';
                                  echo '<td><form method="POST" action="edit-reservation.php"  class="register-form">
                                <input type="hidden" name="res_id" class="form-control" id="res_id" value="';echo $row['id']; echo '">           
                                <button type="submit" name="edit" class="btn btn-primary">Edit</button>
                                </form>
                                </td>';
                                echo '<td><form method="POST" action="delete-reservation.php"  class="register-form">
                                <input type="hidden" name="res_id" class="form-control" id="res_id" value="';echo $row['id']; echo '">           
                                <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                                </form>
                                </td>';
                                }

                            echo '</tr>';
                   }
                }
            }
        ?>
      </table>
   </div>

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