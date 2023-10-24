<!DOCTYPE html>
<html lang="en">

<head>
    <title>Summer collection | Sweet Dreams</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link rel="icon" href="../../public/images/sweet dreams logo-01.png" type="image/icon type" />
    <link rel="stylesheet" href="../../public/css/summer.css" />
</head>

<body>
    <nav>
        <?php include '../partials/nav.php'; ?>
        <?php include '../partials/side.php'; ?>
    </nav>
    <h2>Summer collection</h2>

    <?php
    $sql = "SELECT * FROM products WHERE category='Summer_Collection'";
    include_once "../../config.php";
    $result = mysqli_query($conn, $sql);
    ?>

    <div class="our_Products">
        <?php
        // Check if there are products to display
        if (mysqli_num_rows($result) > 0) {
            // Loop through the products and display them dynamically
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row["id"];
                $title = $row["title"];
                $price = $row["price"];
                $description = $row["description"];
                $prod_image = $row["prod_image"];
        ?>
                <div class="products">
                    <div class="prod">
                        <form method="post" action="prod_desc.php">
                            <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
                            <button type="submit" name="add_to_description"><img src="../../public/<?php echo $prod_image; ?>"></button>
                        </form>
                        <div class="design">
                            <h5><?php echo $title; ?></h5>
                            <h6><?php echo $description; ?></h6>
                            <h6><?php echo $price; ?></h6>
                            <form method="post" action="wishlist.php">
                                <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
                                <button type="submit" class="btn" name="add_to_wishlist"><i class="fa fa-heart"></i></button>
                            </form>
                            <form method="post" action="cart.php">
                                <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
                                <button type="submit" class="btn" name="add_to_cart"><i class="fa fa-shopping-bag"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
        <?php
            }
        } else {
            // If there are no products, display a message
            echo "<p>No products found in the Summer Collection.</p>";
        }
        ?>
    </div>

    <?php include '../partials/footer.php'; ?>
</body>

</html>
