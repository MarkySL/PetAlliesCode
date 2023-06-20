<?php

$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "petallies";

$con = mysqli_connect($hostname,$username,$password,$dbname);

if (!$con) {
    die("Connection Timeout");  
}


?>