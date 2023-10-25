<?php

session_start();

// Include connection
include_once "../../../config.php";

// Check if the user is logged in.
if (!isset($_SESSION['Email'])) {
    // Redirect the user to the login page.
    header("Location: /sweet-dreams/views/pages/login.php");
    exit();
} 

// Escape the user input.
$username = mysqli_real_escape_string($conn, $_SESSION['Email']);

// Delete the user from the database.
$sql = "DELETE FROM admins WHERE Email = '$username'";
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