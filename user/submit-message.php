<?php
session_start();
include "../config.php";
if (isset($_POST['message'])) {
$user_id=$_SESSION['user_id'];
$body=$_POST['body'];
    if (empty($body)==true) {
        if (empty($body)==true) {
           $_SESSION['body_empty']="Fill this form";
        }
        header("Location: message.php");
    }else {
        $ins="INSERT INTO message (user_id,body)VALUES('$user_id','$body')";
        $conn->query($ins);
	    $_SESSION['message'] = 'Registered succesfully';
	    header('location: message.php');
    }
}
?>

