<?php
$servername = "localhost";
$username = "root";
$password = "";
$DB = "sweet_dreams";

$conn = mysqli_connect($servername,$username,$password,$DB);


if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}