<?php 
session_start();
define("HOST","localhost");
define("UNAME","root");
define("PWD","");
define("DBNAME","online_ticket");
$conn=mysqli_connect(HOST,UNAME,PWD,DBNAME);
$fname=$_POST["fname"];
$lname=$_POST["lname"];
$origin=$_POST["origin"];
$destination=$_POST["destination"];
$phone=$_POST["phone"];
$address=$_POST["address"];
$date=$_POST["date"];
$set_number=$_POST["set_number"];
$bus_type=$_POST["bus_type"];
$user_id=$_SESSION["user_id"];
$reservation_id=$_POST["reservation_id"];


$sql ="SELECT * FROM routes where origin = '".$origin."' and destination = '".$destination."' and date='".$date."' and bus_type='".$bus_type."'";
$result=$conn->query($sql);
$row=$result->num_rows;

if(empty($fname)||empty($lname)||empty($origin)||empty($destination)||empty($date)||empty($phone)||empty($address)||empty($set_number)||empty($bus_type)) {
    $_SESSION['form_error']='Some forms are not filled check them';
    header('Location:.../user/reservation.php');
}else{
    if (!$row==0) {
        $sql2="UPDATE reservation SET user_id='$user_id',fname='$fname',lname='$lname',origin='$origin',destination='$destination',phone='$phone',address='$address',set_number=$set_number,date='$date',bus_type='$bus_type' where id='$reservation_id'";
        if ($conn->query($sql2) === TRUE) {      
        header('location: dashboard.php');
        } else {
        echo "Error: " . $sql2 . "<br>" . $conn->error;
        }
    }else {
        $_SESSION['no_route']='No Route! Change the departure date or bus type and resubmit the form';
        header('location: ../user/reservation.php');
    }
    
}
?>