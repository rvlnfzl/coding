<?php 
session_start();
include("connect.php");

$username = $_SESSION["username"];

setcookie("token", "", time() - (60 * 60));

$sql = "UPDATE users SET token = null WHERE username = '$username'";
$koneksi->query($sql);

session_destroy();

header("Location: login.php")
?>