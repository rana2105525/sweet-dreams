<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="login.css" />
  </head>
  
  <body>
    
    <section class="container">
    <a href="index.php"><img src="imgs/Sweet Dreams logo-01.png" alt="logo" ></a>
      <form action="#" class="form">
        <div class="input-box">
          <label>Email</label>
          <input type="text" name="email" placeholder="username@email.com" required />
          <span>If you don't have an account please <a href="reg.php">SignUp</a><span>

        </div>



        <div class="input-box">
            <label>Password</label>
            <input type="password" name="password" placeholder="Enter your password" required />
            <a href="#">Forget password?</a>

        </div>
        

        <button>Submit</button>
      </form>
    </section>
    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve form data
  $email = $_POST["email"];
  $password = $_POST["password"];

  // Perform validation
  $errors = array();

  // Validate email
  if (empty($email)) {
    $errors[] = "Email is required";
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email format";
  }

  // Validate password
  if (empty($password)) {
    $errors[] = "Password is required";
  }

  // If there are no errors, you can proceed with further processing
  if (empty($errors)) {
    
  }
}
?>
  </body>
</html>