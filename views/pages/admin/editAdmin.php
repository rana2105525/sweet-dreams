<!DOCTYPE html>
<html>
<head>
<title>Edit Admin</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="../../../public/css/admin/editAdmin.css" />
    <link rel="icon" href="../../../public/images/Sweet Dreams logo-01.png" type="image/icon type" />
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


      

      // Check if the user is logged in as an admin
      if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
          // Redirect the user to the login page if not logged in as an admin
          header("Location: /sweet-dreams/views/pages/");
          exit();
      }
      

include_once "../../../config.php";
function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}
$errors = [];
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $phoneNumber = isset($_POST['number']) ? $_POST['number'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';


    if (empty($name)&&empty($phoneNumber)&&empty($email)&&empty($password)&&empty($gender)&& 
    !$emailTaken)
    {
      $errors[] = "All fields are required, including selecting a gender.";
    }
    elseif (empty($name)) {
        $errors[] = "Name is required";
    }
    
    elseif (empty($phoneNumber)) {
        $errors[] = "Phone number is required";
    } elseif (!ctype_digit($phoneNumber)) {
        $errors[] = "Phone number should contain only numbers";
    }

    elseif (empty($email)) {
        $errors[] = "Email is required";
    } elseif (!isValidEmail($email)) {
        $errors[] = "Invalid email format";
    }
    $sql = "SELECT * FROM registrations WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $emailErr = "Email is already taken";
        $emailTaken = true;
    }

    elseif (empty($password)) {
        $errors[] = "Password is required";
    }

    elseif (empty($gender)) {
        $errors[] = "Gender is required";
    }

    if (count($errors) === 0) {
        // Sanitize and escape user input to prevent SQL injection
        $name = mysqli_real_escape_string($conn, $name);
        $phoneNumber = mysqli_real_escape_string($conn, $phoneNumber);
        $email = mysqli_real_escape_string($conn, $email);
        $password = password_hash($password, PASSWORD_DEFAULT);
        $gender = mysqli_real_escape_string($conn, $gender);

        // Update the session variables based on form data
        $_SESSION['id'] = $id;
        $_SESSION['name'] = $name;
        $_SESSION['number'] = $phoneNumber;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        $_SESSION['gender'] = $gender;

        // Update the admin information in the database
        $sql = "UPDATE admins SET Username='$name', Phone='$phoneNumber', Email='$email', Password='$password', Gender='$gender' WHERE Email='" . $_SESSION['email'] . "'or ID='". $_SESSION['id'] ."'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            // Redirect to the login page after updating admin info
            header("Location: /sweet-dreams/views/pages/login.php");
            exit();}
    }
}
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

    <button type="submit">Edit Admin</button>
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