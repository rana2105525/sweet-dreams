<!DOCTYPE html>
<html lang="en">

<head>
    <title>My cart | Sweet Dreams</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link rel="icon" href="../../public/images/Sweet Dreams logo-01.png" type="image/icon type" />
    <link rel="stylesheet" href="../../public/css/cart.css" />
</head>
<body>
  <nav> 
    <?php include '../partials/nav.php'; ?>
    <?php include '../partials/side.php'; ?>
  </nav>

  <?php
if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];

    // Check if the cart array exists in the session
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Flag to check if the product is already in the cart
    $product_already_in_cart = false;

    // Check if the product with the same ID already exists in the cart
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['id'] == $product_id) {
            // Product already exists in the cart, update the quantity or do nothing
            $product_already_in_cart = true;
            break;
        }
    }

    if (!$product_already_in_cart) {
        include_once "../../config.php";
        // Retrieve the product attributes from the database based on the product ID
        $sql = "SELECT  * ,sum(price) as total FROM products WHERE id = $product_id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        // Add the product ID and attributes to the cart array
        $_SESSION['cart'][] = array(
            'id' => $product_id,
            'title' => $row['title'],
            'description' => $row['description'],
            'price' => $row['price'],
            'prod_image' => $row['prod_image'],
            'category' => $row['category'],
            'total' => $row['total']
        );
    }
}
?>





    <h1 id="title">My cart</h1>
    <div class="our_Products">

        <table>
            <?php
            if (empty($_SESSION['cart'])) {
                echo '<div class="empty-cart-message">Your cart is empty.</div>';
            } else {
                foreach ($_SESSION['cart'] as $key => $item) {
                    ?>
                    <div class="products">
                        <div class="prod">
                            <img src="../../public/<?php echo $item['prod_image']; ?>">
                            <div class="design">
                                <h5><?php echo $item['title']; ?></h5>
                                <h6><?php echo $item['description']; ?></h6>
                                <h6>Price: $<?php echo $item['price']; ?></h6>
                                
                                <form method="post" action="remove_item.php">
                                    <input type="hidden" name="item_index" value="<?php echo $key; ?>">
                                    <button type="submit" class="btn" id="rmvbtn" name="remove_from_cart">Remove&nbsp;<i
                                            class="fa fa-remove"></i></button>
                                </form>
                                <!-- Quantity input field -->
                                <form method="post" action="update_quantity.php">
                                    <input type="hidden" name="item_index" value="<?php echo $key; ?>">
                                    <label for="quantity">Quantity:</label>
                                    <input type="number" name="quantity" value="<?php echo $item['quantity']; ?>" min="1"
                                        max="100" class="quantity-input" />
                                    <button type="submit" class="btn" name="update_quantity">Update</button>
                                </form>
                                <h6>Total: $<?php echo $item['total']; ?></h6>
                            </div>
                        </div>
                    </div>

<?php

}
    }

?> 

 <div class="checkout-btn">
        <button><a href="checkout.php">Checkout</a></button>
    </div>
<?php include '../partials/footer.php'; ?>


</body>

</html>