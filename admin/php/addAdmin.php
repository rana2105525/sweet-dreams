<?php
  include_once "../../includes/dbh.inc.php";
?> 
<!DOCTYPE html>
<html lang="en">
<head>
<title>Sweet Dreams</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href=".././css/addAdmin.css" />
    <link rel="icon" href="../../imgs/Sweet Dreams logo-01.png" type="image/icon type" />
</head>

<body>

<?php 
  function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
  }

  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $phoneNumber = $_POST['number'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';

    if (empty($name) || empty($phoneNumber) || empty($email) || empty($password) || empty($gender)) {
      echo "<p style='color: red;display: inline-block;'>All fields are required, including selecting a gender.</p>";
    } elseif (!ctype_digit($phoneNumber)) {
      echo "<p style='color: red;display: inline-block;'>Phone number should contain only numbers.</p>";    
    } elseif (!ctype_alpha($name)) {
      echo "<p style='color: red; display: inline-block;'>Name should contain only letters.</p>";
    } elseif (!isValidEmail($email)) {
      echo "<p style='color: red; display: inline-block;'>Invalid email format.</p>";
         // } else {
             
         //     echo "<p>Name: $name</p>";
         //     echo "<p>Phone Number: $phoneNumber</p>";
         //     echo "<p>Email: $email</p>";
         //     echo "<p>Password: $password</p>";
         // }
     }
   }
   if($_SERVER["REQUEST_METHOD"]=="POST"){ //check if form was submitted
    $Name=htmlspecialchars($_POST["name"]);
    $Phone=htmlspecialchars($_POST["number"]);
    $Email=htmlspecialchars($_POST["email"]);
    $Password=htmlspecialchars($_POST["password"]);
    $Gender=htmlspecialchars($_POST["gender"]);
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);}
      //insert it to database 
    $sql="insert into admins(Username ,Phone ,Email ,Password ,Gender)
    values('$Name','$Phone','$Email','$hashed_password','$Gender')";
    $result=mysqli_query($conn,$sql);
    if(!$result)
      die(mysqli_error($conn));
  }
?>
<div class="component">
<div class="sidebar rows">
  <a href="../../index.php"><img class ="logo" src="../../imgs/sweet dreams logo-01.png" alt="logo" ></a>
  <a href="addAdmin.php">Add Admin</a>
  <a href="addProduct.php">Add Product</a>
  <a href="allProducts.php">Products</a>
  <a href="viewAdmin.php">Admins</a>
  <a href="users.php">Users</a>
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