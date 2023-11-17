<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product description</title>
    <!-- Stylesheet -->
    <link rel="stylesheet" href="../../public/css/prod.css">
    <!---Boxicons CDN Setup for icons-->
    <link rel="icon" href="imgs/sweet dreams logo-01.png" type="image/icon type" />
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<nav>
    <?php include '../partials/nav.php'; ?>
    <?php include '../partials/side.php'; ?>
</nav>
<?php


include_once "../../config.php";




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
    }
    ?>
    
    <div class="container">
        <div class="single-product">
            <div class="row">
                <div class="col-6">
                    <div class="product-image">
                        <div class="product-image-main">
                        <img src="../../public/<?php echo $product['prod_image']; ?>" alt="" id="product-main-image">
                        </div>
                        <div class="product-image-slider">
                            <img src="../../public/images/1.jpg" alt=""  class="image-list">
                            <img src="../../public/images/2.jpg" alt=""  class="image-list">
                            <img src="../../public/images/3.jpg" alt=""  class="image-list">
                            <img src="../../public/images/4.jpg" alt=""  class="image-list">
                            <img src="../../public/images/5.jpg" alt=""  class="image-list">

                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="breadcrumb">
                        <span><a href="index.php">Home</a></span>
                        <!-- <span><a href="summer.php">Product</a></span> -->
                        <span class="active"><?php echo $product['title'];?></span>
                    </div>

                    <div class="product">
                        <div class="product-title">
                            <h2><?php echo $product['title'];?></h2>
                        </div>
                       
                        <div class="product-price">
                            <span class="offer-price"><?php echo $product['price'];?></span>
                        </div>

                        <div class="product-details">
                            <h3>Description</h3>
                            <p><?php echo $product['description'];?></p>
                        </div>
                        <div class="product-size">
                            <h4>Size</h4>
                            <div class="size-layout">
                                <input type="radio" name="size" value="S" id="1" class="size-input">
                                <label for="1" class="size">0-3</label>

                                <input type="radio" name="size" value="M" id="2" class="size-input">
                                <label for="2" class="size">3-6</label>

                                <input type="radio" name="size" value="L" id="3" class="size-input">
                                <label for="3" class="size">6-12</label>

                                <input type="radio" name="size" value="XL" id="4" class="size-input">
                                <label for="4" class="size">12-24</label>
                                
                                <a href="../../public/images/size-chart.jpg">Size chart</a>
                            
                            </div>
                        </div>
                        <div class="product-color">
                            <h4>Color</h4>
                            <div class="color-layout">
                                <input type="radio" name="color"  value="black" class="color-input">
                                <label for="black" class="black"></label>
                                <input type="radio" name="color"  value="red" class="color-input">
                                <label for="red" class="red"></label>

                                <input type="radio" name="color"  value="blue" class="color-input">
                                <label for="blue" class="blue"></label>
                            </div>
                        </div>
                        <span class="divider"></span>

                        <div class="product-btn-group">
                            <!-- <div class="button buy-now"><i class='bx bxs-zap' ></i> Buy Now</div> -->
                            <div class="button heart"><i class='bx bxs-zap' ></i><a href="cart.php"> Buy now</a></div>
                            <div class="button heart"><i class='bx bxs-heart' ></i> Add to Wishlist</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="rev">
    <h2>Customer Reviews</h2>
    <form action="" class="form" method="post">
        <div class="text-field">
            <label for="name">Write your review</label>
            <input type="text" id="fullname" name="fullname" placeholder="Write your name">
            <input type="text" id="review" name="review" placeholder="Write your review">
            <button type="submit" class="btn" name="submit">Submit</button>
        </div>
    </form>
    </div>

    <?php include '../partials/footer.php'; ?>

    <!--script-->
    <script src="../../public/js/script.js"></script>
</body>
</html>