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
  <link rel="icon" href="../../public/images/Sweet Dreams logo-01.png" type="image/icon type" />
  <link rel="stylesheet" href="../../public/css/edit_info.css" />
</head>

<body>
<?php
$nameErr=$emailErr="";
function test_input($data)
{
 $data = trim($data);
 $data = stripslashes($data);
 $data = htmlspecialchars($data);
 return $data;
}

// Include connection
include_once "../../config.php";

// Check if the user is logged in.
if (!isset($_SESSION['fullname']) || !isset($_SESSION['email'])) {

 header('Location: login.php');
exit();
}

// Check if the user has submitted the form.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

$name = $_POST['FName'];
$email = $_POST['email'];

 $name = mysqli_real_escape_string($conn, $name);
 $email = mysqli_real_escape_string($conn, $email);

    // Validate the user input.
    if (empty($name)) {
        $nameErr = "Name is required";
    } else {
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }

    if (empty($email)) {
        $emailErr = "Email is required";
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }


    if (empty($nameErr) && empty($emailErr)) {
        $sql = "UPDATE registrations SET fullname='$name', email='$email' WHERE email = '" . $_SESSION['email'] . "'";
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
}

?>






<h1>Edit Profile</h1>
<section class=container>
<form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' method='post' class="form">
<div class="input-box">
<label>Fullname</label>
  <input type='text' value="<?php echo $_SESSION['fullname']; ?>" name='FName' required/><br>
  <span class="error"> <?php echo $nameErr;?></span>

</div>
<div class="input-box">
<label>Email</label>
  <input type='text' value="<?php echo $_SESSION['email']; ?>" name='email' required/><br>
  <span class="error"> <?php echo $emailErr;?></span>
</div>
  
  <button class="button" type='submit' value='Submit' name='Submit'>Save</button>
</form>
</section>

<?php include '../partials/footer.php'; ?>



</body>

</html> 
