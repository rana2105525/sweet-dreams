<!DOCTYPE html>
<style>
.error {color:#FF0000;}
</style>
<html lang="en">
  <head>
    <title>Login | Sweet Dreams</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="icon" href="../../public/images/Sweet Dreams logo-01.png"type="image/icon type" />
    <link rel="stylesheet" href="../../public/css/login.css" />
  </head>

  <body>
  <?php
  session_start();
 $emailerr = $passworderr =$error="";
 if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["email"])) {
  $emailerr = "Email is required";
  } else {
  $email = test_input($_POST["email"]);

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $emailerr = "Invalid email format";
  }
 }


 if (empty($_POST["password"])) {
  $passworderr = "Password is required";
  }
 }
 function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
 }




//  $sql_admin = "SELECT * FROM admins WHERE Email = '$email'";
//  $result_admin = mysqli_query($conn, $sql_admin);

//  if ($row_admin = mysqli_fetch_assoc($result_admin)) {
//  if (password_verify($password, $row_admin['Password'])) {
//  $_SESSION['admin'] = true;
//  $_SESSION['ID'] = $row_admin['ID'];
//  $_SESSION['Name'] = $row_admin['Username'];
//  $_SESSION['Phone'] = $row_admin['Phone'];
//  $_SESSION['Email'] = $row_admin['Email'];
//  $_SESSION['Password'] = $row_admin['Password'];
//  $_SESSION['Gender'] = $row_admin['Gender'];

//  header("Location:admin/viewAdmin.php");
//  exit();
//  } else {
//  $error = "Invalid credentials.";
//  }
//  } else {

//  $sql_reg = "SELECT * FROM reg WHERE email = '$email'";
//  $result_reg = mysqli_query($conn, $sql_reg);

// if ($row_reg = mysqli_fetch_assoc($result_reg)) {

// if (password_verify($password, $row_reg['password'])) {

//  $_SESSION['admin'] = false;
//  $_SESSION['iD'] = $row_reg['id'];
//  $_SESSION['name'] = $row_reg['name'];
//  $_SESSION['email'] = $row_reg['email'];
//  $_SESSION['password'] = $row_reg['password'];
//  $_SESSION['birth'] = $row_reg['birth'];
//  $_SESSION['gender'] = $row_reg['gender'];


// header("Location: index.php");
// exit();
// } else {
// $error = "Invalid credentials.";
//  }
//  } else {
//  $error = "Invalid credentials.";
// }
// }
 //}

 if(isset($_POST['submit'])){
	include_once "../../User.php";
	include_once "../../Admin.php";

	$email=$_POST["email"];
	$password=$_POST["password"];

	$UserObject=User::login($email,$password);
	if ($UserObject!==NULL)
	{	
		$_SESSION["id"]=$UserObject->id;
		header("Location:index.php");
	}
	else {
		$UserAdmin=Admin::adminLogin($email,$password);
		if ($UserAdmin!==NULL)
		{	
			$_SESSION["ID"]=$UserAdmin->ID;
			header("Location: admin/addAdmin.php");
		}
	}
}
?>
<section class="container">
    <a href="index.php"><img src="../../public/images/sweet dreams logo-01.png" alt="logo"></a>
    <form method="post" class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="input-box">
            <label>Email</label>
            <input type="text" name="email" placeholder="username@email.com" required />
             <span class="error" style="color:red"><?php echo $emailerr?></span> 
          

            <br>
            <span>If you don't have an account please <a href="reg.php">SignUp</a><span>
        </div>

        <div class="input-box">
            <label>Password</label>
            <input type="password" name="password" placeholder="Enter your password" required />
             <span class="error"> <?php echo $passworderr?></span> 
             <span class="error"><?php echo $error?></span> 
            <a href="#">Forget password?</a>
        </div>

        <button type="submit" name="submit" value="Submit">Submit</button>
    </form>
</section>
  </body>
</html>