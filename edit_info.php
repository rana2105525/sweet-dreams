<!DOCTYPE html>
<html lang="en">

<head>
  <title>Edit info</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
  <link rel="icon" href="imgs/sweet dreams logo-01.png" type="image/icon type" />
  <link rel="stylesheet" href="edit_info.css" />
</head>

<body>

<h1>Edit Profile</h1>
<section class=container>
<form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' method='post' class="form">
<div class="input-box">
<label>Fullname</label>
  <input type='text' value="<?php echo $_SESSION['fullname']; ?>" name='FName' required/><br>
</div>
<div class="input-box">
<label>Email</label>
  <input type='text' value="<?php echo $_SESSION['email']; ?>" name='email' required/><br>
</div>
  
  <button class="button" type='submit' value='Submit' name='Submit'>Save</button>
</form>
</section>


<footer class="pageFooter">
    <div class="col">
      <a href="index.php"><img class="Logo" src="imgs/sweet dreams logo-01.png" alt="" width="145" height="100"></a>
      <h4>Contact</h4>
      <p><strong>Adress: </strong>Misr International University</p>
      <p><strong>Phone: </strong>010000000</p>
      <p><strong>Hours: </strong>9 am - 12 am . Mon-Sat</p>
      <div class="follow">
        <h4>Follow us</h4>
        <div class="icon">
          <a href="https://www.facebook.com/"> <i class="fab fa-facebook-f"></i></a>
          <a href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
          <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
          <a href="https://www.pinterest.com/"><i class="fab fa-pinterest"></i></a>
          <a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
        </div>
      </div>
    </div>
    <div class="col">
      <h4>About</h4>
      <a href="about.php">About us</a>
      <a href="index.php">Home</a>
      <a href="#">Privacy policy</a>
      <a href="#">Terms & conditions</a>

    </div>

    <div class="col">
      <h4>My Account</h4>
      <a href="login.php">Sign in</a>
      <a href="#">View cart</a>
      <a href="#">My wishlist</a>
    </div>

    <div class="col install">
      <h4>Install app</h4>
      <p>From App-Store or Google play</p>
      <div class="row">
        <img src="imgs/appStore.png" width="130" height="40">
        <img src="imgs/googlePlay (2).png" width="130" height="40">
      </div>
      <p>Secured payment geteways</p>
      <img src="imgs/Payment.png" width="300" height="50">

    </div>


  </footer>


  <div class="copyright">
    <p>© 2023, Sweet dreams - E-Commerce</p>
  </div>



</body>

</html> 
<?php

session_start();

// Include connection
include_once "includes/dbh.inc.php";

// Check if the user is logged in.
if (!isset($_SESSION['fullname']) || !isset($_SESSION['email'])) {
    // Redirect the user to the login page.
    header('Location: login.php');
    exit();
}

?>



<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Get the user input.
    $name = $_POST['FName'];
    $email = $_POST['email'];

    // Escape the user input.
    $name = mysqli_real_escape_string($conn, $name);
    $email = mysqli_real_escape_string($conn, $email);

    // Update the user profile.
    $sql = "UPDATE registrations SET fullname='$name', email='$email' WHERE ID = '" . $_SESSION['id'] . "'";
    $result = mysqli_query($conn, $sql);

    // Check if the update was successful.
    if ($result) {
        // Update the session variables.
        $_SESSION['fullname'] = $name;
        $_SESSION['email'] = $email;

        // Redirect the user to the index page.
        header('Location: index.php');
        exit();
    } else {
        // Display an error message.
        echo 'Error updating user profile.';
    }
}

?>