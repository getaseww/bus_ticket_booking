<?php
session_start();
require "../config.php";
if (isset($_POST['login'])) {
$email = $_POST['email'];
$password = sha1($_POST['password']);
$sql="SELECT * FROM user WHERE email = '".$email."' and password = '".$password."'";
$result = $conn->query($sql);
$row = $result->num_rows;
$r = $result->fetch_array();
if ($row==1) {
    if ($r['is_admin']==1) {
        $_SESSION['user_id'] = $r['id'];
        $_SESSION['is_admin'] = $r['is_admin'];
        $_SESSION['logged'] = $email+date();
        header("Location: ../admin/dashboard.php");
    }else {
        $_SESSION['user_id'] = $r['id'];
        $_SESSION['logged'] = $email+date();
        header("Location: dashboard.php");
    }
} else {
    $_SESSION['login_error'] = "Incorrect Email or Password!!!";
     header("Location: login.php");
}
}
?>

