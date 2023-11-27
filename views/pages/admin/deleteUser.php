<?php
session_start();

include_once "../../../config.php";
include_once "../../../Admin.php";

if(isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];

    // Use the static function deleteUser from the Admin class
    if(Admin::deleteUser($id)) {
        header("location: users.php");
        exit();
    } else {
        die(mysqli_error($conn));
    }
}
?>