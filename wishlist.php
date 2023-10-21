<!DOCTYPE html>
<html lang="en">

<head>
    <title>My Wishlist | Sweet Dreams</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link rel="icon" href="imgs/sweet dreams logo-01.png" type="image/icon type" />
    <link rel="stylesheet" href="cart.css" />
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
  if (isset($_POST['add_to_wishlist'])) {
    $product_id = $_POST['product_id'];
    include_once "includes/dbh.inc.php";
    // Retrieve the product attributes from the database based on the product ID
    $sql = "SELECT * FROM products WHERE id = $product_id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    // Check if the wishlist array exists in the session
    if (!isset($_SESSION['wishlist'])) {
        $_SESSION['wishlist'] = array();
    }

    // Add the product ID and attributes to the wishlist array
    $_SESSION['wishlist'][] = array(
        'id' => $product_id,
        'title' => $row['title'],
        'description' => $row['description'],
        'price' => $row['price'],
        'prod_image' => $row['prod_image'],
        'category' => $row['category']
    );
  
}
  ?>

<!-- Add the rest of the code for wishlist.php here -->

            <h1>My Wishlist</h1>
            <div class="our_Products">
        <table>
<?php

// Loop through the wishlist array and display the product information for each item in the array


// Loop through the wishlist array and display the product information for each item in the array
foreach ($_SESSION['wishlist'] as $key => $item) {

?>

<div class="products">
  <div class="prod">

    <img src="<?php echo $item['prod_image']; ?>">
    <div class="design">
      <h5><?php echo $item['title']; ?></h5>
      <h6><?php echo $item['description']; ?></h6>
      <h6><?php echo $item['price']; ?></h6>
      <form method="post" action="cart.php">
    <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
    <button type="submit" class="btn" name="add_to_cart"><i class="fa fa-shopping-bag"></i></button> 
</form>
      <form method="post" action="remove_item.php">
        <input type="hidden" name="item_index" value="<?php echo $key; ?>">
        <button type="submit" class="btn" name="remove_from_wishlist">Remove <i class="fa fa-remove"></i></button>
      </form>
    </div>
  </div>
</div>

<?php

}

?>



<?php include 'partials/footer.php'; ?>


</body>

</html>