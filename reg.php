<?php
  include_once "includes/dbh.inc.php";
?>
<!DOCTYPE html>
<style>
.error {color:#FF0000;}
</style>
<html lang="en">
  <head>
    <title>Registration</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="icon" href="imgs/sweet dreams logo-01.png"type="image/icon type" />
    <link rel="stylesheet" href="reg.css" />
  </head>
  
  <body>
    <?php

      $nameErr =$passwordErr=$confirmErr=$birthErr= $emailErr="";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["name"])) {
        $nameErr = "Name is required";
      } else {
        $name = test_input($_POST["name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
          $nameErr = "Only letters and white space allowed";
        }
      }
      if (empty($_POST["email"])) {
      $emailErr = "Email is required";
    } else {
      $email = test_input($_POST["email"]);
      // check if e-mail address is well-formed
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
      }
    }
    //check password and confirm not empty and the passwords are equal
    if (empty($_POST["password"])) {
      $passwordErr = "Password is required";
    }

    if (empty($_POST["confirm"])) {
      $confirmErr = "Confirm is required";
    } else {
      $confirm = test_input($_POST["confirm"]);
      
      if ($_POST["password"] === $_POST["confirm"]){
      $confirmErr="";
    }
    else{
      $confirmErr="passwords doesn't match";
    }
    }  
 
if(empty($_POST["birth"])){
  $birthErr="Enter your birth";
}
//Function to check if the date is valid (searching for it)

//hashing password
$new_password=$_GET['password'];
$hashed_password=password_hash($new_password1,PASSWORD_DEFAULT);




    }


      function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
    ?>
    
    <section class="container">
    <a href="index.php"><img src="imgs/sweet dreams logo-01.png" alt="logo" ></a>
      <form method="post" class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="input-box">
          <label>Full Name</label>
          <input type="text" name="name" placeholder="Enter your name" required>
          <span class="error"> <?php echo $nameErr;?></span>
        </div>

        <div class="input-box">
          <label>Email Address</label>
          <input type="text" name="email" id="email" method="post" placeholder="Enter email address" required />
          <span class="error"><?php echo $emailErr;?></span>
        </div>

        <div class="input-box">
            <label>Password</label>
            <input type="password" name="password" id='password' method="post" placeholder="Enter your password" required />
            <span class="error"><?php echo $passwordErr;?></span>
          </div>
          

        <div class="input-box">
            <label>Confirm password</label>
            <input type="password" name="confirm" placeholder="Confirm your password" required />
            <span class="error"><?php echo $confirmErr;?></span>
        </div>

        <div class="column">
          <div class="input-box">
            <label>Birth Date</label>
            <input type="date" name="birth" placeholder="Enter birth date" required />
            <span class="error"><?php echo $birthErr;?></span>
          </div>
        </div>
        <div class="gender-box">
          <h3>Gender</h3>
          <div class="gender-option">
            <div class="gender">
              <input type="radio" id="check-male" name="gender" checked />
              <label for="check-male">Male</label>
            </div>
            <div class="gender">
              <input type="radio" id="check-female" name="gender" />
              <label for="check-female">Female</label>
            </div>
           
          </div>
        </div>
       
      <button input type="submit" name="submit" value="Submit">Submit</button>
      </form>
    </section>
    <?php
 //grap data from user if form was submitted 

  if($_SERVER["REQUEST_METHOD"]=="POST"){ //check if form was submitted
	$Fname=htmlspecialchars($_POST["name"]);
	$Email=htmlspecialchars($_POST["email"]);
	$Password=htmlspecialchars($_POST["password"]);
	$Birth=htmlspecialchars($_POST["birth"]);
	$Gender=htmlspecialchars($_POST["gender"]);

    //insert it to database 
	$sql="insert into registrations(fullname,email,password,birth,gender) 
	values('$Fname','$Email','$password','$Birth','$Gender')";
	 $result=mysqli_query($conn,$sql);

  //   //redirect the user back to index.php 
  if (empty($nameErr) && empty($emailErr) && empty($passwordErr) && empty($confirmErr) && empty($birthErr)) {
    header('location:index.php');
  }
}

?>
  </body>
</html>