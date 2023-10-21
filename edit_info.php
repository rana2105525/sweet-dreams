<?php session_start(); ?>
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

<?php include 'partials/footer.php'; ?>



</body>

</html> 
<?php



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
    $sql = "UPDATE registrations SET fullname='$name', email='$email' WHERE fullname = '" . $_SESSION['fullname'] . "'";
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