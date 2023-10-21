<?php
include("../../includes/dbh.inc.php");
session_start();
function deleteUser($userId) {
    global $conn;  

    $sql = "DELETE FROM admins WHERE id=".$_SESSION['ID'];


    if (mysqli_query($conn, $sql)) {
        return true;  
    } else {
        return false;  
    }
}

if ($_SESSION['ID']) {
    $userId = $_SESSION['ID'];

    if (deleteUser($_SESSION['ID'])) {
        echo "User deleted successfully.";

        $_SESSION = array();

        session_destroy();

        header("Location: /sweet-dreams/login.php");
        exit();
    }
}
?>