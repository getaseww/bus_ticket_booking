<?php
require_once "../config.php";
$res_id=$_POST['res_id'];
$sql="UPDATE reservation SET status='approved' where id='$res_id'";
$conn->query($sql);
header('Location: dashboard.php');
?>