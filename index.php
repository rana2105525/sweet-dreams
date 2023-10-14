<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Home</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="imgs/Sweet Dreams logo-01.png"type="image/icon type" />
    <link rel="stylesheet" href="index.css" />
  </head>
<body>
<script src="slideshow.js"></script>

<nav>
  <div class="wrapper1">
    <div class="logo"><a href="index.php"><img src="imgs/Sweet Dreams logo-01.png" alt="logo" ></a></div>
    <ul class="nav-links">
      <label for="close-btn" class="btn close-btn"><i class="fas fa-times"></i></label>
        <li><a href="index.php">Home</a></li>
        <li><a href="#">Shop</a></li>
        <li><a href="login.php">Login</a></li>
    </ul>
  </div>
  <div class="wrap">

   <div class="search">
      <input type="text" class="searchTerm" placeholder="What are you looking for?">
      <button type="submit" class="searchButton">
        <i class="fa fa-search"></i>
     </button>
   </div>
</div>

  <input type="checkbox" id="active">
    <label for="active" class="menu-btn"><span></span></label>
    <label for="active" class="close"></label>
    <div class="wrapper">
      <ul>
            <li><a href="#">Summer collection</a></li>
            <li><a href="#">Winter collection</a></li>
            <li><a href="#">Bundle and save</a></li>
            <li><a href="#">Blog</a></li>
            <li><a href="#">Gifts</a></li>
            <li><a href="#">Reviews</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">Contact us</a></li>
        </ul>
    </div>
    </nav>
<br>
<header>
    <section class='hero-header'>
        <h1>Shop and explore our new collection to get the chance to earn gifts</h1>
        <h2>Hurry up!!!</h2>
        <a href="#"><button class="img_btn">Explore</button></a>
    </section>
</header>
<br>
<div class="h_products" ><h2>Our products</h2> </div><br>
<div class="Contain">
            <div class="box" id="col1">
                <a href="#">
                    <button type="button" class="b">
                        <img src="imgs/long-sleeved-t-shirt-children-s-clothing-top-cool-summer-boy-8c83e609f4319973d698e96068482e7a.png" alt="">
                        <p>Summer collection</p>
                    </button>
                </a>
            </div>
            <div class="box" id="col2">
                <a href="#">
                    <button type="button" class="b">
                        <img src="imgs/t-shirt-pajamas-carters-boy-clothing-little-monster-baby-home-pajamas-f14325570f638347c4aa1cccd0ca5e3f.png" alt="">
                        <p>Winter collection</p>
                    </button>
                </a>
            </div>
            <div class="box" id="col3">
                <a href="#">
                    <button type="button" class="b">
                        <img src="imgs/pngegg.png" alt="">
                        <p>Bundle and save</p>
                    </button>
                </a>
            </div>
<br>
</div>
  </body>
</html>