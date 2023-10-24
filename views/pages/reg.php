<?php
  include_once "../../config.php";
?>
<!DOCTYPE html>

<html lang="en">
  <head>
    <title>Registration | Sweet Dreams</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="icon" href="../../public/images/sweet dreams logo-01.png"type="image/icon type" />` 
    <link rel="stylesheet" href="../../public/css/reg.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
      $(document).ready(function() {
        $('#email').on('blur', function() {
          var email = $(this).val();
          $.ajax({
            url: 'check_email.php',
            type: 'POST',
            data: { email: email },
            success: function(response) {
              $('#email-error').text(response);
            }
          });
        });
      });
    </script>
  </head>

  <body>
  <?php
  function isStrongPassword($password) {
    // Password requirements: at least 8 characters, one uppercase letter, one lowercase letter, one number, and one special character
    $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,}$/';
    return preg_match($pattern, $password);
}
include_once "../../config.php";

// Define variables to hold error messages
$nameErr = $emailErr = $passwordErr = $confirmErr = $birthErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate the name field
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }

    // Validate the email field
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }
    $email = test_input($_POST["email"]);
    $sql = "SELECT * FROM registrations WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $emailErr = "Email is already taken";
        $emailTaken = true;
    }

    // Validate the password field
  // Validate the password field
if (empty($_POST["password"])) {
  $passwordErr = "Password is required";
} elseif (!isStrongPassword($_POST["password"])) {
  $passwordErr = "Password must be at least 8 characters long and contain one uppercase letter, one lowercase letter, one number, and one special character";
}

    // Validate the confirm password field
    if (empty($_POST["confirm"])) {
        $confirmErr = "Confirm is required";
    } else {
        $confirm = test_input($_POST["confirm"]);

        if ($_POST["password"] !== $_POST["confirm"]) {
            $confirmErr = "Passwords don't match";
        }
    }

    // Validate the birth date field
    if (empty($_POST["birth"])) {
        $birthErr = "Enter your birth date";
    } else {
        $birth = test_input($_POST["birth"]);

        if (!isDateValid($birth)) {
            $birthErr = "Birth date cannot be in the future";
        }
    }

    // Check if there are any errors
    if (empty($nameErr) && empty($emailErr) && empty($passwordErr) && empty($confirmErr) && empty($birthErr)&& 
    !$emailTaken) {
        // Grap data from user if form was submitted
        $Fname = htmlspecialchars($_POST["name"]);
        $Email = htmlspecialchars($_POST["email"]);
        $Password = htmlspecialchars($_POST["password"]);
        $Birth = htmlspecialchars($_POST["birth"]);
        $Gender = htmlspecialchars($_POST["gender"]);
        $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        // Insert data into the database
        $sql = "INSERT INTO registrations(fullname,email,password,birth,gender) 
                VALUES ('$Fname','$Email','$hashed_password','$Birth','$Gender')";
        $result = mysqli_query($conn, $sql);

        // Check if the data was inserted successfully
        if ($result) {
            // Redirect the user back to index.php
            header('Location: index.php');
            exit();
        } else {
            // Handle the database insertion error
            echo "Error inserting data into the database: " . mysqli_error($conn);
        }
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function getTodayDate()
{
    return date('Y-m-d');
}

function isDateValid($date)
{
    $maxDate = getTodayDate(); // Get the current date

    if ($date > $maxDate) {
        return false; // Date is in the future
    }

    return true; // Date is valid
}


    
    ?>
    
    <section class="container">
    <a href="index.php"><img src="../../public/images/Sweet Dreams logo-01.png" alt="logo" ></a>
      <form method="post" class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="input-box">
          <label>Full Name</label>
          <input type="text" name="name" placeholder="Enter your name" required>
          <span class="error"> <?php echo $nameErr;?></span>
        </div>

        <div class="input-box">
          <label>Email Address</label>
          <input type="text" name="email" id="email" placeholder="username@email.com" required />
          <span class="error"><?php echo $emailErr;?></span>
      <span class="error"  id="email-error"></span>

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
              <input type="radio" id="check-male" name="gender" value="male"/>
              <label for="check-male">Male</label>
            </div>
            <div class="gender">
              <input type="radio" id="check-female" name="gender" value="female" />
              <label for="check-female">Female</label>
            </div>
           
        </div>
      
      <button input type="submit" name="submit" id="submit-button" value="Submit">Submit</button>
      </form>
    </section>
    
    <?php
 //grap data from user if form was submitted 

 if (isset($_POST['submit'])){ //check if form was submitted
	$Fname=htmlspecialchars($_POST["name"]);
	$Email=htmlspecialchars($_POST["email"]);
	$Password=htmlspecialchars($_POST["password"]);
	$Birth=htmlspecialchars($_POST["birth"]);
	$Gender=htmlspecialchars($_POST["gender"]);
}
?>
  </body>
</html>