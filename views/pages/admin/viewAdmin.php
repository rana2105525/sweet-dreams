<!DOCTYPE html>
<html lang="en">
<head>
<title>Sweet Dreams</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="../../../public/css/admin/viewAdmin.css" />
    <link rel="icon" href="../../../public/images/Sweet Dreams logo-01.png" type="image/icon type" />
</head>

<body>
<?php 
      session_start();

      // Check if the user is logged in as an admin
      if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
          // Redirect the user to the login page if not logged in as an admin
          header("Location: /sweet-dreams/views/pages/");
          exit();
      }
      ?>

<div class="component">
<div class="sidebar rows">
  <?php include '../../partials/adminSidebar.php';?>
</div>

<div class="content">
  <section class="container rows">
    <div class="form">
      
        <div id="title"><h2>Admin Profile</h2></div>

        <div class="input-box">
            <label for="name:">Name: &nbsp;</label>
              <?php echo $_SESSION["Name"];?>
            </div>

        <div class="input-box">
            <label for="number">Phone Number: &nbsp;</label>
            <?php echo $_SESSION["Phone"]; ?>
        </div>

        <div class="input-box">
            <label for="email">Email: &nbsp;</label>
            <?php echo $_SESSION["Email"]; ?>
        </div> 

        <div class="input-box">
            <label for ="gender" >Gender: &nbsp;</label>
            <?php echo $_SESSION["Gender"]; ?>
        </div> 

        <button id ="edit"><a href="editAdmin.php">Edit Profile</a></button>
        <button id ="delete"><a href="deleteAdmin.php">Delete Account</button>

</div>
    </section>
</div>
</div>

</body>
</html>