<?php 
include "../config.php";
session_start();
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
$sql ="SELECT * FROM routes where origin = '".$origin."' and destination = '".$destination."' and date='".$date."' and bus_type='".$bus_type."'";
$result=$conn->query($sql);
$row=$result->num_rows;

if(empty($fname)||empty($lname)||empty($origin)||empty($destination)||empty($date)||empty($phone)||empty($address)||empty($set_number)||empty($bus_type)) {
    $_SESSION['form_error']='Some forms are not filled check them';
    header('Location:reservation.php');
}else{
    if (!$row==0) {
        $sql2="INSERT INTO reservation (user_id,fname,lname,origin,destination,phone,address,date,set_number,bus_type)VALUES($user_id,'".$_POST['fname']."','".$_POST['lname']."','".$_POST['origin']."','".$_POST['destination']."','".$_POST['phone']."','".$_POST['address']."','".$_POST['date']."','".$_POST['set_number']."','".$_POST['bus_type']."')";
        if ($conn->query($sql2) === TRUE) {      
        header('location: ../index.php');
        } else {
           echo "Error: " . $sql2 . "<br>" . $conn->error;
       }
    }else {
        $_SESSION['no_route']='No Route! Change the departure date or bus type and resubmit the form';
        header('location: reservation.php');
    }
    
}


?>