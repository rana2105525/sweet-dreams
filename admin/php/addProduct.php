<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Add Product</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href=".././css/addProduct.css" />
    <link rel="icon" href="../../imgs/Sweet Dreams logo-01.png"type="image/icon type" />
  </head> 
<body>

<?php
      if ($_SERVER["REQUEST_METHOD"] === "POST") {
          $productName = $_POST['name'];
          $productPrice = $_POST['price'];
          $productDescription = $_POST['description'];
      
          if (empty($productName) || empty($productPrice) || empty($productDescription)) {
              echo "<p style='color: red;'>All fields are required.</p>";
          } elseif (!ctype_alpha($productName)) {
              echo "<p style='color: red;'>Product title should contain only words.</p>";
          } elseif (!ctype_digit($productPrice)) {
              echo "<p style='color: red;'>Product price should be a number.</p>";
          } elseif (!ctype_alpha($productDescription)) {
              echo "<p style='color: red;'>Product description should contain only words.</p>";
          } elseif (empty($_FILES['prod_image']['name'])) {
              echo "<p style='color: red;'>Please upload a product image.</p>";}
          // } else {
          //  
          //     echo "<p>Product Title: $productName</p>";
          //     echo "<p>Product Price: $productPrice</p>";
          //     echo "<p>Product Description: $productDescription</p>";
          // }
      }
?>
<div class="sidebar">
  <a id ="first" href="addAdmin.php">Add Admin</a>
  <a href="addProduct.php">Add Product</a>
  <a href="#contact">Users</a>
  <a href="#about">Reviews</a>
</div>
<div class ="content">
<section class="container">
      <form action="#" class="form" method="post">
        <div id="title"><h2>Add a new product</h2></div>
        <div class="input-box">
            <label for ="name">Product Title</label>
            <input type="text" id="name" name="name" placeholder="Enter product's title" />
        </div>

        <div class="input-box">
            <label for="price" >Product price</label>
            <input type="number" step="any" id ="price" name ="price" placeholder="Enter product's price" />
        </div>

        <div class="input-box">
            <label for ="description">Product description</label>
            <input type="text" id="description" name="description" placeholder="Enter product's descriptioon" />
        </div> 

        <div class="input-box">
            <label for="prod_image">Product image</label>
            <input type="file" id="prod_image" name="prod_image" accept =".png,.jpg"/>
        </div>
        <button type="submit">Add Product</button>
      </form>
    </section>
</div>

  </body>
</html>