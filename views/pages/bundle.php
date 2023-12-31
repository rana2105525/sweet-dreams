<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bundle and save collection | Sweet Dreams</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link rel="icon" href="../../public/images/sweet dreams logo-01.png" type="image/icon type" />
    <link rel="stylesheet" href="../../public/css/bundle.css" />
</head>

<body>
    <nav>
        <?php include '../partials/nav.php'; ?>
        <?php include '../partials/side.php'; ?>
    </nav>
    <h2>Bundle and save collection</h2>

    <?php
    $sql = "SELECT * FROM products WHERE category='Bundle'";
    include_once "../../config.php";
    $result = mysqli_query($conn, $sql);
    ?>
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
                $category= $row["category"];
        ?>
       <div class="prod">
<div class="product-card">

		
		<div class="product-tumb">
        <form method="post" action="prod.php">
        <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">  
        <button type="submit"  name="add_to_description"><img src="../../public/<?php echo $prod_image; ?>"></button>
        </form>

		</div>
		<div class="product-details">
			<span class="product-catagory"><?php echo $category; ?></span>
			<h4><?php echo $title; ?></h4>
			<p><?php echo $description; ?></p>
			<div class="product-bottom-details">
				<div class="product-price"><?php echo $price; ?>LE</div>
				<div class="product-links">
					<a href=""><i class="fa fa-heart"></i></a>
					<a href=""><i class="fa fa-shopping-cart"></i></a>
				</div>
			</div>
		</div>

        
	</div>
            </div>   
    <?php
            }
        } else {
            // If there are no products, display a message
            echo "<p>No products found in the Bundle and save Collection.</p>";
        }
        ?>
    
    <?php include '../partials/footer.php'; ?>

    
</body>

</html>
