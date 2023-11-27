<!DOCTYPE html>
<html>
<head>
<title>Edit Admin</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="../../../public/css/admin/editAdmin.css" />
    <link rel="icon" href="../../../public/images/Sweet Dreams logo-01.png" type="image/icon type" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#email').on('blur', function () {
                var email = $(this).val();
                $.ajax({
                    url: 'check_emails.php',
                    type: 'POST',
                    data: {
                        Email: email
                    },
                    success: function (response) {
                        $('#email-error').text(response);
                    }
                });
            });
        });
    </script>
</head>
<body>
<style>
.error {color: #FF0000;}
.error-container {
    text-align: center;
    margin-top: 20px; 
}
</style>
<?php
session_start();

    //   // Check if the user is logged in as an admin
    //   if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    //       // Redirect the user to the login page if not logged in as an admin
    //       header("Location: /sweet-dreams/views/pages/");
    //       exit();
    //   }
      

include_once "../../../config.php";
include_once "../../../Admin.php";
function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}
$errors = [];
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = isset($_POST['name']) ? mysqli_real_escape_string($conn, $_POST['name']) : '';
    $phoneNumber = isset($_POST['number']) ? mysqli_real_escape_string($conn, $_POST['number']) : '';
    $email = isset($_POST['email']) ? mysqli_real_escape_string($conn, $_POST['email']) : '';
    $password = isset($_POST['password']) ? mysqli_real_escape_string($conn, $_POST['password']) : '';
    $gender = isset($_POST['gender']) ? mysqli_real_escape_string($conn, $_POST['gender']) : '';

if(isset($_POST['submit'])){
if (empty($name) || empty($phoneNumber) || empty($email) || empty($password) || empty($gender)) {
    $errors[] = "All fields are required.";
}

if (!isValidEmail($email)) {
    $errors[] = "Invalid email format.";
}

    if (empty($errors)) {

        $updateResult = Admin::updateAdmin($_SESSION['ID'], $name, $phoneNumber, $email, $password, $gender);

        if ($updateResult) {
            header("Location: ../login.php");
            exit();
        }

    }}}

?>
<div class="component">
<div class="sidebar rows">
      <?php include '../../partials/adminSidebar.php';?>
</div>
<div class="content">
  <section class="container">
  <form action="" method="post" class="form">
    <div id="title"><h2>Edit admin</h2></div>

    <div class="input-box">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" placeholder="Enter admin's name" />
    </div>

    <div class="input-box">
        <label for="number">Phone Number</label>
        <input type="number" id="number" name="number" placeholder="Enter admin's number" />
    </div>

    <div class="input-box">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter admin's email" />
    </div> 

    <div class="input-box">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" />
    </div>
    
    <div class="input-box">
        <label for="gender">Gender</label>
    </div> 
    <div class="row">
        <span class="column">
            <input type="radio" name="gender" id="male" value="Male">
            <label for="male">Male</label>
        </span>
        <span class="column">
            <input type="radio" name="gender" id="female" value="Female">
            <label for="female">Female</label>
        </span>
    </div>

    <button type="submit" name="submit">Edit Admin</button>
</form>
<div class="error-container">
        <?php
        foreach ($errors as $error) {
            echo "<p class='error'>$error</p>";
        }
        ?>
    </div>
    </section>
</div>
</div>
</body>
</html>