<!DOCTYPE html>
<html lang="en">

<head>
    <title>Product description | Sweet Dreams</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link rel="icon" href="imgs/sweet dreams logo-01.png" type="image/icon type" />
    <link rel="stylesheet" href="prod_desc.css" />
</head>

<body>

    <nav>
   <?php include 'partials/nav.php'; ?>
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
    <?php
  if (!isset($_SESSION['description'])) {
    $_SESSION['description'] = array();
  }
  if (isset($_POST['add_to_description'])) {
    $product_id = $_POST['product_id'];
    include_once "includes/dbh.inc.php";
    // Retrieve the product attributes from the database based on the product ID
    $sql = "SELECT * FROM products WHERE id = $product_id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    // Check if the wishlist array exists in the session
  

    // Add the product ID and attributes to the wishlist array
    $_SESSION['description'][] = array(
        'id' => $product_id,
        'title' => $row['title'],
        'description' => $row['description'],
        'price' => $row['price'],
        'prod_image' => $row['prod_image'],
        'category' => $row['category']
    );
  
}
  ?>





















<?php


if (isset($_POST['submit'])) {

  $fullname = $_POST['fullname'];
  $review = $_POST['review'];
  include_once "includes/dbh.inc.php";

  $sql = "INSERT INTO reviews (fullname, review) VALUES ('$fullname', '$review');";

  $result = mysqli_query($conn, $sql);

  if (!$result) {
    die(mysqli_error($conn));
  }
}

?>

    <body>
    <?php
    if (empty($_SESSION['wishlist'])) {
      echo '<div class="empty-wishlist-message">Your wishlist is empty.</div>';
    } else {
        foreach ($_SESSION['wishlist'] as $key => $item) {
    ?>
  <div class="cont">
    <div class="product-img">
    <img src="<?php echo $item['prod_image']; ?>" height="420" width="327">    </div>
    <div class="product-info">
      <div class="product-text">
      <h1><?php echo $item['title']; ?></h1>
      <p><?php echo $item['description']; ?></p>
      </div>
      <div class="product-price-btn">
        <p><?php echo $item['price']; ?></p>
        <button type="button">buy now</button>
      </div>
    </div>
  </div>

  <?php

}
    }

?>

  <h2>Customer Reviews</h2>
  <form action="" class="form" method="post" >

  <div class="text-field">
    <label for="name">Review</label> 
    <input type="text" id="fullname" name="fullname" placeholder="Write your name">
    <input type="text" id="review" name="review" placeholder="Write your review">
    <button type="submit" class="btn" name="submit">Submit</button>
</div>
</form>



<?php include 'partials/footer.php'; ?>


</body>