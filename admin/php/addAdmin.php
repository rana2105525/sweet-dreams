<?php
  include_once "../../includes/dbh.inc.php";
?> 
<!DOCTYPE html>
<style>
.error {color: #FF0000;}
.error-container {
    text-align: center;
    margin-top: 20px; 
}
</style>
<html lang="en">
<head>
<title>Sweet Dreams</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href=".././css/addAdmin.css" />
    <link rel="icon" href="../../imgs/Sweet Dreams logo-01.png" type="image/icon type" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
  $(document).ready(function() {
    $('#email').on('blur', function() {
      var email = $(this).val();
      $.ajax({
        url: 'check_emails.php', // Updated the URL to match the correct filename
        type: 'POST',
        data: { Email: email }, // Updated the key to match the PHP code
        success: function(response) {
          $('#email-error').text(response);
        }
      });
    });
  });
  
</script>
</head>

<body>
<?php
function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $phoneNumber = isset($_POST['number']) ? $_POST['number'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';

    $errors = [];
    if (empty($name)&&empty($phoneNumber)&&empty($email)&&empty($password)&&empty($gender))
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

    elseif (empty($password)) {
        $errors[] = "Password is required";
    }

    elseif (empty($gender)) {
        $errors[] = "Gender is required";
    }

    if (count($errors) === 0) {
        // All fields are valid, proceed to insert into the database
        $Name = mysqli_real_escape_string($conn, $name);
        $Phone = mysqli_real_escape_string($conn, $phoneNumber);
        $Email = mysqli_real_escape_string($conn, $email);
        $Password = password_hash($password, PASSWORD_DEFAULT); // Hash the password
        $Gender = mysqli_real_escape_string($conn, $gender);

        // Insert data into the "admins" table
        $sql = "INSERT INTO admins (Username, Phone, Email, Password, Gender) VALUES ('$Name', '$Phone', '$Email', '$Password', '$Gender')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "Admin added successfully!";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        // Display the validation errors
        echo "<div class='error-container'>";
        foreach ($errors as $error) {
            echo "<p class='error'>$error</p>";
        }
        echo "</div>";
    }
}
?>


<div class="component">
<div class="sidebar rows">
  <a href="../../index.php"><img class ="logo" src="../../imgs/sweet dreams logo-01.png" alt="logo" ></a>
  <a href="addAdmin.php">Add Admin</a>
  <a href="addProduct.php">Add Product</a>
  <a href="allProducts.php">Products</a>
  <a href="viewAdmin.php">Admin</a>
  <a href="users.php">Users</a>
  <a href="allAdmins.php">Admins</a>
  <a href="reviews.php">Reviews</a>
</div>

<div class="content">
  <section class="container rows">
    <form action="" method="post" class="form">
        <div id="title"><h2>Add a new admin</h2></div>

        <div class="input-box">
            <label for="name">Name</label>
            <input type="text" id ="name" name="name" placeholder="Enter admin's name" />
        </div>

        <div class="input-box">
            <label for="number">Phone Number</label>
            <input type="number" id="number" name="number" placeholder="Enter admin's number" />
        </div>

        <div class="input-box">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter admin's email" />
            <span class="error"  id="email-error"></span>
        </div> 

        <div class="input-box">
            <label for ="password" >Password</label>
            <input type="password" id ="password" name="password" placeholder="Enter your password" />
        </div>
        
        <div class="input-box">
            <label for ="gender" >Gender</label>
        </div> 
        <div class ="row">
        <div class ="column"> 
          <input type="radio" name="gender" id="male" value="Male">
          <label for ="male" >Male</label>
        </div>
        <div class ="column">
          <input type="radio" name="gender" id="female" value="Female">
          <label for ="female" >Female</label>
        </div>
        </div>

        <button type ="submit">Add Admin</button>
      </form>
    </section>
</div>
</div>

</body>
</html>