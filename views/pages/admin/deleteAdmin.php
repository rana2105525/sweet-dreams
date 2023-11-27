<?php
session_start();

include_once "../../../config.php";
include_once "../../../Admin.php";

if (!isset($_SESSION['ID'])) {
    header("Location: /sweet-dreams/views/pages/login.php");
    exit();
} 

$adminID = $_SESSION['ID'];
$deleteResult = Admin::deleteAdmin($adminID);

if ($deleteResult) {
    session_destroy();
    header("Location: login.php"); 
} else {
    echo 'Error deleting user.';
}
?>
