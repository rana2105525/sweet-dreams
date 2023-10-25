<!DOCTYPE html>
<html lang="en">

<head>
  <title>Home | Sweet Dreams</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
  <link rel="icon" href="../../public/images/Sweet Dreams logo-01.png" type="image/icon type" />
  <link rel="stylesheet" href="../../public/css/index.css" />
</head>

<body>
 
<?php

  ?>
  <nav>
  <?php include '../partials/nav.php'; ?>

      </ul>
    </div>

    <!-- <div class="wrap">
      <div class="search">
        <input type="text" class="searchTerm" placeholder="What are you looking for?">
        <button type="submit" class="searchButton">
          <i class="fa fa-search"></i>
        </button>
      </div>
    </div> -->

    <?php include '../partials/side.php'; ?>
  </nav>

  <header>
    <section class='hero-header'>
      <h1>Shop and explore our new collection to get the chance to earn gifts</h1>
      <h2>Hurry up!!!</h2>
      <a href="#"><button class="img_btn">Explore</button></a>
    </section>
  </header>
  
  <br>
  <div class="h_products">
    <h2>Our products</h2>
  </div><br>
  <div class="Contain">
    <div class="box" id="col1">
      <a href="summer.php">
        <button type="button" class="b">
          <img
            src="../../public/images/long-sleeved-t-shirt-children-s-clothing-top-cool-summer-boy-8c83e609f4319973d698e96068482e7a.png"
            alt="">
          <p>Summer collection</p>
        </button>
      </a>
    </div>
    <div class="box" id="col2">
      <a href="winter.php">
        <button type="button" class="b">
          <img
            src="../../public/images/t-shirt-pajamas-carters-boy-clothing-little-monster-baby-home-pajamas-f14325570f638347c4aa1cccd0ca5e3f.png"
            alt="">
          <p>Winter collection</p>
        </button>
      </a>
    </div>
    <div class="box" id="col3">
      <a href="bundle.php">
        <button type="button" class="b">
          <img src="../../public/images/pngegg.png" alt="">
          <p>Bundle and save</p>
        </button>
      </a>
    </div>
    <br>
  </div>
  <br>
  <br>
  <section id="banner" class="section-banner">

    <h2>Explore our <span>Bundle and save </span>products</h2>
    <button><a href="#"><strong>Explore more</strong></a></button>


  </section>
  <?php
    $sql = "SELECT id, title, price, prod_image FROM products ORDER BY id DESC LIMIT 3;";
    include_once "../../config.php";
    $result = mysqli_query($conn, $sql);
    ?>
  <br>
  <br>
  <div class="h_products">
    <h2>New arrivals</h2>
  </div><br>
  <div class="Contain">
  <?php

            // Loop through the products and display them dynamically
            while ($row = mysqli_fetch_assoc($result)) {
              $id = $row["id"];
              $title = $row["title"];
              $price = $row["price"];
              $prod_image = $row["prod_image"];
            ?>
    <div class="box" id="col1">
     
          <form method="post" action="prod_desc.php">
                            <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
                            <button type="submit" name="add_to_description"><img style= "width:300px;height:250px;padding-top:20px;padding-left:20px;padding-right:20px;"src="../../public/<?php echo $prod_image; ?>"><p><?php echo $title; ?></p></button>
                            
                        </form>
              
         
        
     
      </div> <?php } ?>
  </div>
  
  <?php include "../partials/footer.php";?>
</body>

</html>