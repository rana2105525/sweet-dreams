<!DOCTYPE html>
<html lang="en">
<head>
<title>Sweet Dreams</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href=".././css/viewAdmin.css" />
    <link rel="icon" href="../../imgs/Sweet Dreams logo-01.png" type="image/icon type" />
</head>

<body>
<?php
// session_start();
// echo "<h1>Your Profile</h1>";
// echo "Name: "     .   $_SESSION["Name"]."<br>";
// echo "Phone: "    .   $_SESSION["Phone"]."<br>";
// echo "Email :"    .   $_SESSION["Email"]."<br>";
// echo "Gender: "   .   $_SESSION["Gender"]."<br><br>";
?>
<div class ="component">
  <div class="sidebar rows">
    <a href="../../index.php"><img class ="logo" src="../../imgs/sweet dreams logo-01.png" alt="logo" ></a>
    <a href="addAdmin.php">Add Admin</a>
    <a href="viewAdmin.php">View Admin</a>
    <a href="addProduct.php">Add Product</a>
    <a href="allProducts.php">Products</a>
    <a href="#contact">Users</a>
    <a href="#about">Reviews</a>
  </div>

  
</div>

<div class="content">
  <section class="container rows">
    <div class="form">
      <?php session_start();?>
        <div id="title"><h2>Admin Profile</h2></div>

<div>
<label> Name: </label> <?php echo $_SESSION["Name"]; ?><br>
<label> Phone: </label> <?php echo $_SESSION["Phone"]; ?><br>
<label> Email: </label> <?php echo $_SESSION["Email"]; ?><br>
<label> Gender: </label> <?php echo $_SESSION["Gender"]; ?><br><br>

</div>
<button id ="edit"><a href="editAdmin.php">Edit Admin </a></button>
<button id ="delete">Delete Admin</button>
</section>
</div>

</body>
</html>