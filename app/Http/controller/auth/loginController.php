<?php
include '../config.php';

$username = $_POST['username'];
$password = md5($_POST['PASSWORD']);

$login = mysql_query("Select * from users where username='$username' and password='$password'");
$cek = mysql_run_rows($login);

if ($cek > 0) {
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    header("location:admin/index.php");
} else {
    header("location:index.php");
}

?>