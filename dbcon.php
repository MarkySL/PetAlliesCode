<?php
session_start();

$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "";

$con = mysqli_connect($hostname,$username,$password,$dbname);

if ($con == false) {
    die("Connection Error");
}
?>