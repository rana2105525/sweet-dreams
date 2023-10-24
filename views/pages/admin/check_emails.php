<?php
// check_email.php

if (isset($_POST['Email'])) {
  $email = $_POST['Email'];

  // Perform email confirmation by checking the database
  // You can add your custom email confirmation logic here

  // Example: Check if the email already exists in the database
  include_once "../../../config.php"; // Include your database connection file

  $stmt = $conn->prepare("SELECT * FROM admins WHERE Email = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    echo "Email is already registered"; // Email is already in the database, display error message
  } else {
    echo "Verified"; // Email is not found in the database, no error message
  }
}
?>