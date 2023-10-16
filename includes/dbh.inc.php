<?php
$servername = "172.232.217.28";
$username = "root";
$password = "SweetDreams123";
$DB = "sweetdreams";

if($conn = mysqli_connect($servername,$username,$password,$DB)){
echo "connected";
}





if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
?>