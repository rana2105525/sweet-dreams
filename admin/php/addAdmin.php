<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add admin</title>
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
         $phoneNumber = $_POST['phoneNumber'];
         $email = $_POST['email'];
         $password = $_POST['password'];

         if (empty($name) || empty($number) || empty($email) || empty($password)) {
             echo "<p style='color: red;'>All fields are required.</p>";
         } elseif (!ctype_digit($number)) {
             echo "<p style='color: red;'>Phone number should contain only numbers.</p>";    
         } elseif (!ctype_alpha($name)) {
           echo "<p style='color: red;'>Name should contain only letters.</p>";}
           elseif (!isValidEmail($email)) {
             echo "<p style='color: red;'>Invalid email format.</p>";
         // } else {
             
         //     echo "<p>Name: $name</p>";
         //     echo "<p>Phone Number: $phoneNumber</p>";
         //     echo "<p>Email: $email</p>";
         //     echo "<p>Password: $password</p>";
         // }
     }
   }
?>

<section class="container">
    <form action="#" method="post" class="form">
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
        <span class ="column">
          <input type="radio" name="gender" id="male" value="male">
          <label for ="male" >Male</label>
        </span>
        <span class ="column">
          <input type="radio" name="gender" id="female" value="female">
          <label for ="female" >Female</label>
        </span>
        </div>

        <button type ="submit">Add Admin</button>
      </form>
    </section>

</body>
</html>
