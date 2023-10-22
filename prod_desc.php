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
    <link rel="stylesheet" href="prod_desc.css" />
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


    <body>
  <div class="cont">
    <div class="product-img">
      <img src="imgs/Copy of Omar & Asia4.jpg" height="420" width="327">
    </div>
    <div class="product-info">
      <div class="product-text">
        <h1>Test</h1>
        <p>nkuihneunouatrjnboalrtjnoujntr </p>
      </div>
      <div class="product-price-btn">
        <p><span>78</span>$</p>
        <button type="button">buy now</button>
      </div>
    </div>
  </div>

  <h2>Customer Reviews</h2>

  <div class="text-field">
    <label for="name">Review</label>
    <input type="text" id="name" name="name" placeholder="Write your review">
    <button>Submit</button>
</div>
  <div class="review-section">

    <div class="review">
        <img src="customer1.jpg" alt="Customer 1">
        <h3>John Doe</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tristique justo ac nibh posuere, vel varius nunc feugiat. Sed vitae metus sed lectus dignissim tristique. Praesent eu feugiat elit.</p>
    </div>
    <div class="review">
        <img src="customer2.jpg" alt="Customer 2">
        <h3>Jane Smith</h3>
        <p>Ut eu ligula volutpat, porta mauris in, fermentum odio. Vivamus tincidunt eros quam, sed efficitur libero consectetur ut. Curabitur eget suscipit nisl. Mauris sit amet lectus dignissim, volutpat tortor et, lacinia purus.</p>
    </div>
</div>


<?php include 'partials/footer.php'; ?>


</body>