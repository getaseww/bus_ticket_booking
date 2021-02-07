<?php
session_start();
include "config.php";
if (isset($_POST['contact'])) {
$name=$_POST['name'];
$email=$_POST['email'];
$message=$_POST['message'];
    if (empty($email)==true||empty($name)==true||empty($message)==true) {
        if (empty($name)==true) {
           $_SESSION['name_empty']="Fill this form";
        }
        if (empty($email)==true) {
            $_SESSION['email_empty']="Fill this form";
         }
         if (empty($message)==true) {
            $_SESSION['message_empty']="Fill this form";
         }
        header("Location: contact.php");
    }else {
        $ins="INSERT INTO contact (name,message,email)VALUES('$name','$message','$email')";
        $conn->query($ins);
	    $_SESSION['contact'] = 'Send succesfully';
	    header('location: index.php');
    }
}
?>

