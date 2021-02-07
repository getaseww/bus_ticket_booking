<?php 
include "../config.php";
session_start();
$origin=$_POST["origin"];
$destination=$_POST["destination"];
$date=$_POST["date"];
$bus_type=$_POST["bus_type"];
if (empty($origin)||empty($destination)||empty($date)||empty($bus_type)) {
    $_SESSION['form_error']='Some forms are not filled check them';
    header('Location:route.php');
}else {
    $sql="INSERT INTO routes (origin,destination,date,bus_type)VALUES('".$_POST['origin']."','".$_POST['destination']."','".$_POST['date']."','".$_POST['bus_type']."')";
    if ($conn->query($sql) === TRUE) {      
    header('location: dashboard.php');
    } else {
       echo "Error: " . $sql . "<br>" . $conn->error;
   }
}
?>