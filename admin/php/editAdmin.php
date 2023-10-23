<!DOCTYPE html>
<html>
<head>
<title>Edit Admin</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href=".././css/editAdmin.css" />
    <link rel="icon" href="../../imgs/Sweet Dreams logo-01.png" type="image/icon type" />
</head>
<body>
<?php
session_start();

include_once "../../includes/dbh.inc.php";

function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $phoneNumber = isset($_POST['number']) ? $_POST['number'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';

    if (empty($name) || empty($phoneNumber) || empty($email) || empty($password) || empty($gender)) {
        echo "<p style='color: red;'>All fields are required, including selecting a gender.</p>";
    } elseif (!ctype_digit($phoneNumber)) {
        echo "<p style='color: red;'>Phone number should contain only numbers.</p>";
    } elseif (!ctype_alpha($name)) {
        echo "<p style='color: red;'>Name should contain only letters.</p>";
    } elseif (!isValidEmail($email)) {
        echo "<p style='color: red;'>Invalid email format.</p>";
    } else {
        // Sanitize and escape user input to prevent SQL injection
        $name = mysqli_real_escape_string($conn, $name);
        $phoneNumber = mysqli_real_escape_string($conn, $phoneNumber);
        $email = mysqli_real_escape_string($conn, $email);
        $password = mysqli_real_escape_string($conn, $password);
        $gender = mysqli_real_escape_string($conn, $gender);

        // Update the session variables based on form data
        $_SESSION['name'] = $name;
        $_SESSION['number'] = $phoneNumber;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        $_SESSION['gender'] = $gender;

        // Update the admin information in the database
        $sql = "UPDATE admins SET Username='$name', Phone='$phoneNumber', Email='$email', Password='$password', Gender='$gender' WHERE Email='" . $_SESSION['email'] . "'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            // Redirect to the login page after updating admin info
            header("Location: /sweet-dreams/login.php");
            exit();
        } else {
            echo "<p style='color: red;'>Error updating admin information.</p>";
        }
    }
}
?>

<div class="sidebar">
 <a href="../../index.php"><img class ="logo" src="../../imgs/sweet dreams logo-01.png" alt="logo" ></a>
  <a id ="first" href="addAdmin.php">Add Admin</a>
  <a href="viewAdmin.php">Admin</a>
  <a href="addProduct.php">Add Product</a>
  <a href="allProducts.php">Products</a>
  <a href="users.php">Users</a>
  <a href="allAdmins.php">Admins</a>
  <a href="reviews.php">Reviews</a>
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
    </section>
</div>
</body>
</html>