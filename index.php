<!DOCTYPE html>
<html lang="en">

<head>
  <title>Home</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
  <link rel="icon" href="imgs/sweet dreams logo-01.png" type="image/icon type" />
  <link rel="stylesheet" href="index.css" />
</head>

<body>
 
<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

// Access session variables
$email = $_SESSION['email'];
$fullname = $_SESSION['fullname'];

// Display user information
echo "Welcome, $fullname! Your email is $email.";

// Other code and HTML content for the index page
  ?>
  <nav>
    <div class="wrapper1">
      <div class="logo"><a href="index.php"><img src="imgs/sweet dreams logo-01.png" alt="logo"></a></div>
      <ul class="nav-links">
        <li><a href="index.php">Home</a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="#"><i class="fa fa-shopping-bag"></i></a></li>
        <li><a href="#"><i class="fa fa-heart"></i></a></li>


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
      <a href="#">
        <button type="button" class="b">
          <img
            src="imgs/long-sleeved-t-shirt-children-s-clothing-top-cool-summer-boy-8c83e609f4319973d698e96068482e7a.png"
            alt="">
          <p>Summer collection</p>
        </button>
      </a>
    </div>
    <div class="box" id="col2">
      <a href="#">
        <button type="button" class="b">
          <img
            src="imgs/t-shirt-pajamas-carters-boy-clothing-little-monster-baby-home-pajamas-f14325570f638347c4aa1cccd0ca5e3f.png"
            alt="">
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
  <br>
  <br>
  <section id="banner" class="section-banner">

    <h2>Explore our <span>Bundle and save </span>products</h2>
    <button><a href="#"><strong>Explore more</strong></a></button>


  </section>
  <br>
  <br>
  <div class="h_products">
    <h2>New arrivals</h2>
  </div><br>
  <div class="Contain">
    <div class="box" id="col1">
      <a href="#">
        <button type="button" class="b">
          <img
            src="imgs/long-sleeved-t-shirt-children-s-clothing-top-cool-summer-boy-8c83e609f4319973d698e96068482e7a.png"
            alt="">
          <p>Summer collection</p>
        </button>
      </a>
    </div>
    <div class="box" id="col2">
      <a href="#">
        <button type="button" class="b">
          <img
            src="imgs/t-shirt-pajamas-carters-boy-clothing-little-monster-baby-home-pajamas-f14325570f638347c4aa1cccd0ca5e3f.png"
            alt="">
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
  <br>
  <br>
  <br>
  <footer class="pageFooter">
    <div class="col">
      <a href="index.php"><img class="Logo" src="imgs/sweet dreams logo-01.png" alt="" width="145" height="100"></a>
      <h4>Contact</h4>
      <p><strong>Adress: </strong>Misr International University</p>
      <p><strong>Phone: </strong>010000000</p>
      <p><strong>Hours: </strong>9 am - 12 am . Mon-Sat</p>
      <div class="follow">
        <h4>Follow us</h4>
        <div class="icon">
          <a href="https://www.facebook.com/"> <i class="fab fa-facebook-f"></i></a>
          <a href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
          <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
          <a href="https://www.pinterest.com/"><i class="fab fa-pinterest"></i></a>
          <a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
        </div>
      </div>
    </div>
    <div class="col">
      <h4>About</h4>
      <a href="#">About us</a>
      <a href="index.php">Home</a>
      <a href="#">Privacy policy</a>
      <a href="#">Terms & conditions</a>

    </div>

    <div class="col">
      <h4>My Account</h4>
      <a href="login.php">Sign in</a>
      <a href="#">View cart</a>
      <a href="#">My wishlist</a>
    </div>

    <div class="col install">
      <h4>Install app</h4>
      <p>From App-Store or Google play</p>
      <div class="row">
        <img src="imgs/appStore.png" width="130" height="40">
        <img src="imgs/googlePlay (2).png" width="130" height="40">
      </div>
      <p>Secured payment geteways</p>
      <img src="imgs/Payment.png" width="300" height="50">

    </div>


  </footer>


  <div class="copyright">
    <p>© 2023, Sweet dreams - E-Commerce</p>
  </div>



</body>

</html>