

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sweet Dreams - Add Admin</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../../public/css/admin/addAdmin.css" />
    <link rel="icon" href="../../../public/images/Sweet Dreams logo-01.png" type="image/icon type" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#email').on('blur', function () {
                var email = $(this).val();
                $.ajax({
                    url: 'check_emails.php',
                    type: 'POST',
                    data: {
                        Email: email
                    },
                    success: function (response) {
                        $('#email-error').text(response);
                    }
                });
            });
        });
    </script>
</head>

<body>
<?php
session_start();
include_once "../../../config.php";
include_once "../../../Admin.php";

// Authorization Check
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
  header("Location: /sweet-dreams/views/pages/login.php");
    exit();
}

function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = isset($_POST['name']) ? mysqli_real_escape_string($conn, $_POST['name']) : '';
    $phoneNumber = isset($_POST['number']) ? mysqli_real_escape_string($conn, $_POST['number']) : '';
    $email = isset($_POST['email']) ? mysqli_real_escape_string($conn, $_POST['email']) : '';
    $password = isset($_POST['password']) ? mysqli_real_escape_string($conn, $_POST['password']) : '';
    $gender = isset($_POST['gender']) ? mysqli_real_escape_string($conn, $_POST['gender']) : '';

    if (empty($name) || empty($phoneNumber) || empty($email) || empty($password) || empty($gender)) {
        $errors[] = "All fields are required.";
    }

    if (!isValidEmail($email)) {
        $errors[] = "Invalid email format.";
    }

    if(isset($_POST['submit'])){
        if (empty($errors)) {
            
            $AddAdmin = Admin::addAdmin($name, $phoneNumber, $email, $password, $gender);
    
            if ($AddAdmin !== NULL) {
                header("Location: /sweet-dreams/views/pages/admin/addAdmin.php");
                exit();
            }
        }
    }
    }
    // // Check if email already exists in the database
    // $sql = "SELECT * FROM admins WHERE Email = '$email'";
    // $result = mysqli_query($conn, $sql);
    // if (mysqli_num_rows($result) > 0) {
    //     $errors[] = "Email is already taken.";
    // }

    // if (count($errors) === 0) {
    //     // Hash the password
    //     $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    //     // Insert data into the "admins" table
    //     $sql = "INSERT INTO admins (Username, Phone, Email, Password, Gender) VALUES ('$name', '$phoneNumber', '$email', '$hashedPassword', '$gender')";
    //     $result = mysqli_query($conn, $sql);

    //     if ($result) {
    //         header("Location: /sweet-dreams/views/pages/admin/addAdmin.php");
    //         exit();
    //     } else {
    //         $errors[] = "Error: " . mysqli_error($conn);
    //     }
    // }
?>
    <div class="component">
        <div class="sidebar rows">
            <?php include '../../partials/adminSidebar.php'; ?>
        </div>
        <div class="content">
            <section class="container rows">
                <form action="" method="post" class="form">
                    <div id="title">
                        <h2>Add a new admin</h2>
                    </div>

                    <div class="input-box">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" placeholder="Enter admin's name" />
                    </div>

                    <div class="input-box">
                        <label for="number">Phone Number</label>
                        <input type="number" id="number" name="number" placeholder="Enter admin's number" />
                    </div>

                    <div class="input-box">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter admin's email" />
                        <span class="error" id="email-error"></span>
                    </div>

                    <div class="input-box">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter your password" />
                    </div>

                    <div class="input-box">
                        <label for="gender">Gender</label>
                    </div>
                    <div class="row">
                        <div class="column">
                            <input type="radio" name="gender" id="male" value="Male">
                            <label for="male">Male</label>
                        </div>
                        <div class="column">
                            <input type="radio" name="gender" id="female" value="Female">
                            <label for="female">Female</label>
                        </div>
                    </div>

                    <button type="submit">Add Admin</button>
                </form>
                <div class="error-container">
                    <?php
                    foreach ($errors as $error) {
                        echo "<p class='error'>$error</p>";
                    }
                    ?>
                </div>
            </section>
        </div>
    </div>
</body>

</html>
