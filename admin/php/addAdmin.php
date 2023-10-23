<?php
  include_once "../../includes/dbh.inc.php";
?> 
<!DOCTYPE html>
<html lang="en">
<head>
<title>Sweet Dreams</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href=".././css/addAdmin.css" />
    <link rel="icon" href="../../imgs/Sweet Dreams logo-01.png" type="image/icon type" />
</head>

<body>
<?php
   if(isset($_POST['submit'])){ //check if form was submitted
    $Name=htmlspecialchars($_POST["name"]);
    $Phone=htmlspecialchars($_POST["number"]);
    $Email=htmlspecialchars($_POST["email"]);
    $Password=htmlspecialchars($_POST["password"]);
    $Gender=htmlspecialchars($_POST["gender"]);

    $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
      //insert it to database 
    $sql="insert into admins(Username ,Phone ,Email ,Password ,Gender)
    values('$Name','$Phone','$Email','$hashed_password','$Gender')";
    $result=mysqli_query($conn,$sql);

    
    if(!$result)
      die(mysqli_error($conn));
    
  }
?>
<div class="component">
<div class="sidebar rows">
  <a href="../../index.php"><img class ="logo" src="../../imgs/sweet dreams logo-01.png" alt="logo" ></a>
  <a href="addAdmin.php">Add Admin</a>
  <a href="addProduct.php">Add Product</a>
  <a href="allProducts.php">Products</a>
  <a href="viewAdmin.php">Admin</a>
  <a href="users.php">Users</a>
  <a href="allAdmins.php">Admins</a>
  <a href="reviews.php">Reviews</a>
</div>

<div class="content">
  <section class="container rows">
    <form action="" method="post" class="form">
        <div id="title"><h2>Add a new admin</h2></div>

        <div class="input-box">
            <label for="name">Name</label>
            <input type="text" id ="name" name="name" placeholder="Enter admin's name" />
        </div>

        <div class="input-box">
            <label for="number">Phone Number</label>
            <input type="number" id="number" name="number" placeholder="Enter admin's number" />
        </div>

        <div class="input-box">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter admin's email" />
        </div> 

        <div class="input-box">
            <label for ="password" >Password</label>
            <input type="password" id ="password" name="password" placeholder="Enter your password" />
        </div>
        
        <div class="input-box">
            <label for ="gender" >Gender</label>
        </div> 
        <div class ="row">
        <div class ="column"> 
          <input type="radio" name="gender" id="male" value="Male">
          <label for ="male" >Male</label>
        </div>
        <div class ="column">
          <input type="radio" name="gender" id="female" value="Female">
          <label for ="female" >Female</label>
        </div>
        </div>

        <button type ="submit">Add Admin</button>
      </form>
    </section>
</div>
</div>

</body>
</html>