<?php
session_start();

$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "regform";

$con = mysqli_connect($hostname,$username,$password,$dbname);

if ($con == false) {
    die("Connection Error");
}
?>