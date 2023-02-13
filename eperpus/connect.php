<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "eperpus";

$connect = mysqli_connect($hostname, $username, $password, $database);

if ($connect->connect_error){
    die (mysqli_connect_error());
}

?>