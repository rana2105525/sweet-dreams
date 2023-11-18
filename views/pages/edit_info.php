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
include_once "../../User.php";

// Check if the user is logged in.


// Check if the user has submitted the form.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

$name = $_POST['name'];
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
     // Assuming User class has an updateUserInfo() method
     $UserObject->editUser($name, $email); // Passing the new name and email to the method
     header('Location: index.php');
     exit();
 }
}

$UserObject=new User($_SESSION["id"]);
?>
<h1>Edit Profile</h1>
<section class=container>
<form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' method='post' class="form">
<div class="input-box">
<label>Fullname</label>
  <input type='text' value= " <?php
      echo " $UserObject->name ";
      ?>" name='name' required/><br>
  <span class="error"> <?php echo $nameErr;?></span>

</div>
<div class="input-box">
<label>Email</label>
  <input type='text' value=  "<?php
      echo " $UserObject->email";
      ?>" name='email' required/><br>
  <span class="error"> <?php echo $emailErr;?></span>
</div>


  
<button type="submit" name="save" class="button">save</button>
</form>
</section>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save'])) {
    $UserObject->editUser($name,$email);
}
?>

<?php include '../partials/footer.php'; ?>
</body>

</html> 
