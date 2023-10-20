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


            <h1>My cart</h1>
            <div class="our_Products">
        <table>

                <div class="products">
                
                <div class="prod">
                            <img src="imgs/Copy of Omar & Asia8.jpg">  
                            <div class="design">  

                                <h5>mmm</h5>
                                <h6>cc</h6>
                                <h6>cc</h6>
                               <button class="btn">Move to wishlist <i class="fa fa-heart"> </i></button>
                               <button class="btn">Remove <i class="fa fa-remove"> </i></button>

                            </div>
                           
                        </div>

                        
                        
        </table>
        <div class="our_Products">
        <table>

                <div class="products">
                
                <div class="prod">
                            <img src="imgs/Copy of Omar & Asia8.jpg">  
                            <div class="design">  

                                <h5>mmm</h5>
                                <h6>cc</h6>
                                <h6>cc</h6>
                               <button class="btn">Move to wishlist <i class="fa fa-heart"> </i></button>
                               <button class="btn">Remove <i class="fa fa-remove"> </i></button>

                            </div>
                           
                        </div>
                        
        </table>
        <div class="checkout_btn">
        <button ><a href="checkout.php">Checkout</a></button>
</div>

<?php include 'partials/footer.php'; ?>


</body>

</html>