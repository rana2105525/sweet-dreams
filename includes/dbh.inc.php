<?php
$servername = "";
$username = "rana";
$password = "";
$DB = "sweetDreams";

$conn = mysqli_connect($servername,$username,$password,$DB);


if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}