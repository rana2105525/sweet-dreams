<!DOCTYPE html>
<html lang="en">

<head>
    <title>My cart | Sweet Dreams</title>
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
  <!-- <div class="wrap">
      <div class="search">
        <input type="text" class="searchTerm" placeholder="What are you looking for?">
        <button type="submit" class="searchButton">
          <i class="fa fa-search"></i>
        </button>
      </div>
    </div> -->
<?php include 'partials/nav.php'; ?>

   
    <?php include 'partials/side.php'; ?>
  </nav>
  <?php
  if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    include_once "includes/dbh.inc.php";
    // Retrieve the product attributes from the database based on the product ID
    $sql = "SELECT * FROM products WHERE id = $product_id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    // Check if the cart array exists in the session
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Add the product ID and attributes to the cart array
    $_SESSION['cart'][] = array(
        'id' => $product_id,
        'title' => $row['title'],
        'description' => $row['description'],
        'price' => $row['price'],
        'prod_image' => $row['prod_image'],
        'category' => $row['category']
    );
  
}
  ?>

<h1>My Cart</h1>

<div class="our-products">
 <table>
    <?php
    foreach ($_SESSION['cart'] as $key => $item) {
    ?>
        <div class="product">
        <img src="<?php echo $item['prod_image']; ?>">
    <div class="design">
            <h5><?php echo $item['title']; ?></h5>
            <h6><?php echo $item['description']; ?></h6>
            <h6><?php echo $item['price']; ?></h6>
                <form method="post" action="remove_item.php">
                    <input type="hidden" name="item_index" value="<?php echo $key; ?>">
                    <button type="submit" class="btn" name="remove_from_cart">Remove <i class="fa fa-remove"></i></button>
                </form>
                <form method="post" action="wishlist.php">
                    <input type="hidden" name="product_id" value="<?php echo $item['id']; ?>">
                    <button type="submit" class="btn" name="move_to_wishlist">Move to Wishlist <i class="fa fa-heart"></i></button>
                </form>
            </div>
        </div>
       
</div>
        </div>
        
    <?php
    }
    ?>
     <div class="checkout-btn">
    <button><a href="checkout.php">Checkout</a></button>
</div>
  </table>


        

<?php include 'partials/footer.php'; ?>


</body>

</html>