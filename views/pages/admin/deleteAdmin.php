<?php

session_start();

// Include connection
include_once "../../../config.php";

// Check if the user is logged in.
if (!isset($_SESSION['Username'])) {
    // Redirect the user to the login page.
    header("Location: login.php");
    exit();
} 

// Escape the user input.
$username = mysqli_real_escape_string($conn, $_SESSION['Username']);

// Delete the user from the database.
$sql = "DELETE FROM admins WHERE fullname = '$username'";
$result = mysqli_query($conn, $sql);

// Check if the deletion was successful.
if ($result) {
    // Destroy the session.
    session_destroy();

    // Display a success message.
    header("Location:users.php");
} else {
    // Display an error message.
    echo 'Error deleting user.';
}

?>