<!DOCTYPE html>
<html lang="en">

<head>
    <title>Winter collection | Sweet Dreams</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link rel="icon" href="imgs/sweet dreams logo-01.png" type="image/icon type" />
    <link rel="stylesheet" href="winter.css" />
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
    <h2>Winter collection</h2>

    <!-- Sidebar filter section -->
    <!-- <section id="sidebar">
<div class="border-bottom pb-2 ml-2">
</div>
<div class="fi">
<h3>Color</h3>
<form>
<div class="form-group"> <input type="radio"> <label>Red</label> </div>
<div class="form-group"> <input type="radio" id="5off"> <label>Blue</label> </div>
</form>
</div>
</section> -->
<?php
    $sql = "SELECT * FROM products WHERE category='Winter_Collection'";
    include_once "includes/dbh.inc.php";
    $result = mysqli_query($conn, $sql);
    ?>

    <div class="our_Products">
        <table>
        <?php
            // Loop through the products and display them dynamically
            while ($row = mysqli_fetch_assoc($result)) {
              $id = $row["id"];
              $title = $row["title"];
              $price = $row["price"];
              $description = $row["description"];
              $prod_image = $row["prod_image"];
              $category = $row["category"];
            ?>
                <div class="products">


                <div class="prod">
                            <img src="<?php echo $prod_image; ?>">

                            <div class="design">
                                <h5><?php echo $title; ?></h5>
                                <h6><?php echo $description; ?></h6>
                                <h6><?php echo $price; ?></h6>
                                <button class="btn"> <i class="fa fa-shopping-bag"></i></button>
                                <form method="post" action="wishlist.php">
    <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
    <button type="submit" class="btn" name="add_to_wishlist"><i class="fa fa-heart"></i></button>
</form>
                            </div>
                        </div>
                    <?php
            }
            ?>
        </table>
    </div>

    <?php include 'partials/footer.php'; ?>


</body>

</html>