<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sweet Dreams</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link rel="icon" href="imgs/sweet dreams logo-01.png" type="image/icon type" />
    <link rel="stylesheet" href="checkout.css" />
</head>
<style>
.error {color:#FF0000;}
</style>

<?php
    include_once "includes/dbh.inc.php";
    $fnameErr = $lnameErr = $cardNumErr = $cardHolderErr = $dateErr = $emailErr = $phoneErr = $addressErr = $cvcErr = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["fname"])) {
            $fnameErr = "First name is required";
        } else {
            $fname = test_input($_POST["fname"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z-' ]*$/", $fname)) {
                $fnameErr = "Only letters and white space allowed";
            }
        }
    
        if (empty($_POST["lname"])) {
            $lnameErr = "Last name is required";
        } else {
            $lname = test_input($_POST["lname"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z-' ]*$/", $lname)) {
                $lnameErr = "Only letters and white space allowed";
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
    
        if (empty($_POST['phone'])) {
            $phoneErr = "Phone number is required";
        } else {
            $phone = test_input($_POST['phone']);
            // Remove any non-digit characters from the phone number
            $phone = preg_replace('/\D/', '', $phone);
    
            // Check if the phone number is 11 digits long
            if (strlen($phone) === 11) {
              $phoneErr ="";
            } else {
                $phoneErr = "Phone number is invalid";
            }
        }

       

    if (empty($_POST["address"])) {
        $addressErr = "Address is required";
    } 

    
        if (empty($_POST["exp_date"])) {
            $dateErr = "Enter your expiration date";
        }

        if (empty($_POST["cardNum"])) {
            $cardNumErr = "Card number is required";
        } else {
            $cardNum = test_input($_POST["cardNum"]);
            // Check if the card number is valid
            if (!preg_match("/^\d{16}$/", $cardNum)) {
                $cardNumErr = "Invalid card number";
            }
        }
    
        if (empty($_POST["CVC"])) {
            $cvcErr = "CVC is required";
        } else {
            $cvc = test_input($_POST["CVC"]);
            // Check if the CVC is a three-digit number
            if (!preg_match("/^\d{3}$/", $cvc)) {
                $cvcErr = "Invalid CVC";
            }
        }
        // Function to check if the date is valid (searching for it)

      //  $new_CVC=$_GET['CVC'];
      //  $hashed_CVC=password_hash($new_CVC,PASSWORD_DEFAULT);
    
    
    if (empty($fnameErr) && empty($lnameErr) && empty($cardNumErr)  && empty($dateErr)&& empty($emailErr)&& empty($phoneErr)&&empty($addressErr)&& empty($cvcErr)) {
      $Fname = htmlspecialchars($_POST["fname"]);
      $Lname = htmlspecialchars($_POST["lname"]);
      $Email = htmlspecialchars($_POST["email"]);
      $phone = htmlspecialchars($_POST["phone"]);
      $address = htmlspecialchars($_POST["address"]);
      $cardNum = htmlspecialchars($_POST["cardNum"]);
      $date = htmlspecialchars($_POST["exp_date"]);
      $cvc = htmlspecialchars($_POST["CVC"]);

    $sql=  "INSERT INTO checkout(firstname,lastname,email,phone,address,card_holder,expiring_date,cvc) 
      VALUES ('$Fname','$lname','$Email','$phone','$address','$cardNum','$date', '$cvc')";
$result = mysqli_query($conn, $sql);

if ($result) {
  // Redirect the user back to index.php
  echo"purchase succesfull";
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
    ?>

<body>
  <nav>

<?php include 'partials/nav.php'; ?>


      </ul>
    </div>

        <!-- <div class="wrap">

            <div class="search">
                <input type="text" class="searchTerm" placeholder="What are you looking for?">
                <button type="submit" class="searchButton">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div> -->

        <?php include 'partials/side.php'; ?>
    </nav>

    <br>
    <br>
    <br>
    <h1>Checkout</h1>
    <section class="container">
    <form method="post" class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="input-box">
                <label>First name</label>
                <input type="text" name="fname"  required />
                <span class="error"><?php echo $fnameErr; ?></span>
            </div>
            <div class="input-box">
                <label>Last name</label>
                <input type="text" name="lname"  required />
                <span class="error"><?php echo $lnameErr; ?></span>
            </div>
            <div class="input-box">
                <label>Email</label>
                <input type="text" name="email"  required />
                <span class="error"><?php echo $emailErr; ?></span>

            </div>
            <div class="input-box">
                <label>Phone number</label>
                <input type="text" name="phone"  required />
                <span class="error"><?php echo $phoneErr; ?></span>

            </div>
            <div class="input-box">
                <label>Address</label>
                <input type="text" name="address"  required />  
                <span class="error"><?php echo $addressErr; ?></span>

            </div>
            <div class="input-box">
                <label>Card Num</label>
                <input type="text" name="cardNum"  required />
                <span class="error"><?php echo $cardNumErr; ?></span>

            </div>
            
            <div class="input-box">
                <label>Expiring date</label>
                <input type="date" name="exp_date"  required />
                <span class="error"><?php echo $dateErr; ?></span>
            </div>

            <div class="input-box">
                <label>CVC</label>
                <input type="text" name="CVC"  required />
                <span class="error"><?php echo $cvcErr; ?></span>
            </div>

            </div>
            </div>


            <button input type="submit" name="submit" value="Submit">Checkout</button>
        </form>
    </section>
    <?php
    if (isset($_POST['submit'])){ //check if form was submitted

	  $Fname = htmlspecialchars($_POST["fname"]);
      $Lname = htmlspecialchars($_POST["lname"]);
      $Email = htmlspecialchars($_POST["email"]);
      $phone = htmlspecialchars($_POST["phone"]);
      $address = htmlspecialchars($_POST["address"]);
      $cardNum = htmlspecialchars($_POST["cardNum"]);
      $date = htmlspecialchars($_POST["exp_date"]);
      $cvc = password_hash($_POST['CVC'], PASSWORD_DEFAULT);

}

?>    
    <?php include 'partials/footer.php'; ?>
  
</body>

</html>