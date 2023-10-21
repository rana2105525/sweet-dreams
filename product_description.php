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
    <link rel="stylesheet" href="product_description.css" />
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

    <div class="products">
  <div class="prod">
            <img src="imgs/Copy of Omar & Asia4.jpg" class="xzoom" >
          <div class="design">
            <h5>osyy</h5>
            <h6>moijrvwuihhefbvnieih</h6>
            <span> 122EGP</span><br>
        
              <label for="quant" class="quant">Quantity </label>
              <select name="quant" id="quantity">
                <option value ="1">1</option>
                <option value ="2">2</option>
                <option value ="3">3</option>
                <option value ="4">4</option>
                <option value ="5">5</option>
              </select>
              <br>
            
                <a href="wishlist.php">
                <button >Add to wishlist</button>
                </a>
                 <a href="cart.php">
                 <button class="addCart">Add to cart</button>
                 </a>
            </div>
</div>
</div>

</body>