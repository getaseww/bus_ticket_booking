<?php
session_start();
include "../config.php";
if (isset($_POST['register'])) {
$password = sha1($_POST['password']);
$fname=$_POST['fname'];
$lname=$_POST['lname'];

$sql="SELECT * FROM user WHERE email = '".$_POST['email']."'";
$result = $conn->query($sql);
if ($result->num_rows==0) {
    $email=$_POST['email'];
    if (empty($email)==true||empty($fname)==true||empty($lname)==true||empty($_POST['password'])==true) {
        if (empty($fname)==true) {
           $_SESSION['fname_empty']="Fill this form";
        }
        if (empty($lname)==true) {
            $_SESSION['lname_empty']="Fill this form";
         }
         if (empty($email)==true) {
            $_SESSION['email_empty']="Fill this form";
         }
         if (empty($_POST['password'])==true) {
            $_SESSION['password_empty']="Fill this form";
         }
        header("Location: register.php");
    }else {
        $ins="INSERT INTO user (fname,lname,email,password)VALUES('$fname','$lname','$email','$password')";
        $conn->query($ins);
	    $_SESSION['reg'] = 'Registered succesfully';
	    header('location: login.php');
    }
} else {
    $_SESSION['email_exists'] = "This Email is already registerd";
     header("Location: register.php");
}
}
?>

