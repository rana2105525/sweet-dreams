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

<!-- <div class="myslide">
<input type="radio" id="trigger1" name="slider">
<label for="trigger1">
    <span class="sr-only"></span></label>
<div class="slide bg1"><a href="#"><button>Shop now</button></a></div>

<input type="radio" id="trigger2" name="slider" checked autofocus>
<label for="trigger2">
    <span class="sr-only">Slide 2 of 5. A photo of a bird eating sunflower seeds from an open hand.</span></label>
<div class="slide bg2"></div>

<input type="radio" id="trigger3" name="slider">
<label for="trigger3">
    <span class="sr-only">Slide 3 of 5. A photo of a concrete bridge over the river with high voltage power lines on both banks.</span></label>
<div class="slide bg3"></div>

<input type="radio" id="trigger4" name="slider">
<label for="trigger4">
    <span class="sr-only">Slide 4 of 5. A photo of a lake surrounded by the forest with mountains in the background.</span></label>
<div class="slide bg4"></div>

<input type="radio" id="trigger5" name="slider">
<label for="trigger5"><span class="sr-only">Slide 5 of 5. A photo of a forest.</span></label>
<div class="slide bg5"></div>
</div> -->
  </body>
</html>