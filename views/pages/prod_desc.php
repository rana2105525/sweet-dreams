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
    <link rel="stylesheet" href="../../public/css/prod_desc.css" />
</head>

<body>
  <nav>
            <?php include '../partials/nav.php'; ?>
            <?php include '../partials/side.php'; ?>
        </nav>
    <?php


include_once "../../config.php";


session_start();

if (isset($_POST['submit'])) {

  $fullname = $_POST['fullname'];
  $review = $_POST['review'];

  $sql = "INSERT INTO reviews (fullname, review) VALUES ('$fullname', '$review');";

  $result = mysqli_query($conn, $sql);

  if (!$result) {
    die(mysqli_error($conn));
  }
}



 // Start the session
    if (isset($_POST['add_to_description'])) {
        $product_id = $_POST['product_id'];
        // Retrieve the product attributes from the database based on the product ID
        $sql = "SELECT * FROM products WHERE id = $product_id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $_SESSION['product_description'] = $row;
    }

    if (isset($_SESSION['product_description'])) {
        $product = $_SESSION['product_description'];
    ?>
        

        <div class="cont">
            <div class="product-img">
                <img src="../../public/<?php echo $product['prod_image']; ?>" height="420" width="327">
            </div>
            <div class="product-info">
                <div class="product-text">
                    <h1><?php echo $product['title']; ?></h1>
                    <p><?php echo $product['description']; ?></p>
                </div>
                <div class="product-price-btn">
                    <p><?php echo $product['price']; ?></p>
                    <a href="checkout.php"><button type="button">Buy now</button></a>

                </div>
            </div>
        </div>
    <?php
    }
    ?>

    <h2>Customer Reviews</h2>
    <form action="" class="form" method="post">
        <div class="text-field">
            <label for="name">Review</label>
            <input type="text" id="fullname" name="fullname" placeholder="Write your name">
            <input type="text" id="review" name="review" placeholder="Write your review">
            <button type="submit" class="btn" name="submit">Submit</button>
        </div>
    </form>

    <?php include '../partials/footer.php'; ?>

</body>

</html>