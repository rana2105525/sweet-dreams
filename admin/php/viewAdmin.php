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

<div class="component">
<div class="sidebar rows">
  <a href="../../index.php"><img class ="logo" src="../../imgs/sweet dreams logo-01.png" alt="logo" ></a>
  <a href="addAdmin.php">Add Admin</a>
  <a href="addProduct.php">Add Product</a>
  <a href="allProducts.php">Products</a>
  <a href="viewAdmin.php">Admins</a>
  <a href="users.php">Users</a>
  <a href="allAdmins.php">Admins</a>
  <a href="reviews.php">Reviews</a>
</div>

<div class="content">
  <section class="container rows">
    <div class="form">
      <?php session_start();?>
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

        <button id ="edit"><a href="editAdmin.php">Edit</a></button>
        <button id ="delete"><a href="deleteAdmin.php">Delete</button>

</div>
    </section>
</div>
</div>

</body>
</html>