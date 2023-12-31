<?php
include_once "../../config.php";
include_once "../../User.php";

// Define variables and set them to empty values
$name = $email = $password = $confirm = $birth = $gender =$phone= "";
$nameErr = $emailErr = $passwordErr = $confirmErr = $birthErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Validate the name field
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // Check if name contains only letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }

  // Validate the email field
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // Check if email is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  // Check if email is already taken
  $sql = "SELECT * FROM reg WHERE email = '$email'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    $emailErr = "Email is already taken";
  }

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

    // ... (other validations)

    // Validate the phone number field
    if (empty($_POST["phone"])) {
        $phoneErr = "Enter phone number";
    } else {
      $phone = test_input($_POST["phone"]);
      $desiredLength = 11; // Change this value to the desired phone number length

      if (!isValidPhoneNumber($phone, $desiredLength)) {
          $phoneErr = "Invalid phone number format or length"; // Set an error message if the phone number format or length is invalid
      }
    }

  // If there are no errors, insert data into the database
  if (empty($nameErr) && empty($emailErr) && empty($passwordErr) && empty($confirmErr) && empty($birthErr)) {
    $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    if (User::InsertinDB_Static($name,$email,$phone,$hashed_password, $birth, $gender)) {
      header("Location: login.php");
      exit();
    } else {
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
function isValidPhoneNumber($phoneNumber, $desiredLength) {
    // Validate phone number format using a regular expression
    $pattern = '/^\+?[0-9]+$/'; // Update the pattern based on your specific phone number format;
    $isValidFormat = preg_match($pattern, $phoneNumber);

    // Validate phone number length
    $isValidLength = (strlen($phoneNumber) === $desiredLength);

    return ($isValidFormat && $isValidLength);
}

function isStrongPassword($password)
{
  // Password requirements: at least 8 characters, one uppercase letter, one lowercase letter, one number, and one special character
  $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,}$/';
  return preg_match($pattern, $password);
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
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Registration | Sweet Dreams</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="icon" href="../../public/images/sweet dreams logo-01.png" type="image/icon type" />
  <link rel="stylesheet" href="../../public/css/reg.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="../../public/js/reg.js"></script>
</head>
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
<body>
    
    <section class="container">
    <a href="index.php"><img src="../../public/images/Sweet Dreams logo-01.png" alt="logo" ></a>
      <form method="post" class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="input-box">
          <label>Full Name</label>
          <input type="text" name="name" placeholder="Enter your name" required>
           <span class="error"><?php echo $nameErr ?></span> 
        </div>

        <div class="input-box">
          <label>Email Address</label>
          <input type="text" name="email" id="email" placeholder="username@email.com" required />
           <span class="error"> <?php echo $emailErr?></span> 
       <span class="error"  id="email-error"></span> 
        </div>

        <div class="input-box">
          <label>Phone number</label>
          <input type="text" name="phone" id="phone"  required />

        </div>

        <div class="input-box">
            <label>Password</label>
            <input type="password" name="password" id='password' method="post" placeholder="Enter your password" required />
             <span class="error"><?php echo $passwordErr?></span> 
          </div>
          

        <div class="input-box">
            <label>Confirm password</label>
            <input type="password" name="confirm" placeholder="Confirm your password" required />
             <span class="error"><?php echo $confirmErr?></span> 
        </div>

        <div class="column">
          <div class="input-box">
            <label>Birth Date</label>
            <input type="date" name="birth" placeholder="Enter birth date" required />
            <span class="error"><?php echo $birthErr?></span> 
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
      
      <button input type="submit" name="submit" id="submit-button" value="submit">Submit</button>
      </form>
    </section>
    
    <?php
 //grap data from user if form was submitted 

 if (isset($_POST['submit'])) { //check if form was submitted
  $name = htmlspecialchars($_POST["name"]);
  $email = htmlspecialchars($_POST["email"]);
  $phone = htmlspecialchars($_POST["phone"]);
  $password = htmlspecialchars($_POST["password"]);
  $birth = htmlspecialchars($_POST["birth"]);
  $gender = htmlspecialchars($_POST["gender"]);

  // Handle the form submission here, e.g., store data in a database
}
?>
  </body>
</html>