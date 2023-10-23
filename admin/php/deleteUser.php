<?php
session_start();

// Include connection
include_once "../../includes/dbh.inc.php";
if(isset($_GET['delete_id'])){//delete_id in the url 
    $id = $_GET['delete_id']; //access the delete_id variable
    $sql = "DELETE FROM registrations WHERE id = '$id';";
    $result = mysqli_query($conn,$sql);
    if($result){
        header("location:users.php");
    }
    if(!$result){
        die(mysqli_error($conn));
    }
} 
?>