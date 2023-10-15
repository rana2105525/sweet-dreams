<!DOCTYPE html>
<style>
.error {color:#FF0000;}
</style>
<html lang="en">
  <head>
    <title>Login</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="icon" href="imgs/sweet dreams logo-01.png"type="image/icon type" />
    <link rel="stylesheet" href="login.css" />
  </head>
  
  <body>
  <?php
    $emailerr=$passworderr="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Validate email
  if (empty($_POST["email"])) {
    $emailerr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailerr = "Invalid email format";
    }
  }

  // Validate password
  if (empty($_POST["password"])){
    $passworderr= "Password is required";
  }
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
          <label>Email</label>
          <input type="text" name="email" placeholder="username@email.com" required />
          <span class="error" style="color:red"><?php echo $emailerr;?></span>
          <br>
          <span>If you don't have an account please <a href="reg.php">SignUp</a><span>

        </div>



        <div class="input-box">
            <label>Password</label>
            <input type="password" name="password" placeholder="Enter your password" required />
            <span class="error"><?php echo $passworderr;?></span>
            <a href="#">Forget password?</a>

        </div>
        

        <button input type="submit" name="submit" value="Submit">Submit</button>
      </form>
    </section>

  </body>
</html>