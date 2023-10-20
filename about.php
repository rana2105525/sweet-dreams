<!DOCTYPE html>
<html lang="en">

<head>
    <title>About | Sweet Dreams</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link rel="icon" href="imgs/sweet dreams logo-01.png" type="image/icon type" />
    <link rel="stylesheet" href="about.css" />
</head>

<body>

<nav>
    <div class="wrapper1">
      <div class="logo"><a href="index.php"><img src="imgs/sweet dreams logo-01.png" alt="logo"></a></div>
      <ul class="nav-links">
        
      <?php
session_start();
if (isset($_SESSION['fullname'])) {
    $fullname = $_SESSION['fullname'];
    $profile = "profile.php";
    $home = "signout.php";
    $signout = "Logout";
    $cart="cart.php";
    $cart_class="Cart";
    $wish="wishlist.php";
    $wish_class="Wishlist";
    echo "<li><a href=$profile>$fullname</a></li>";
    echo"<li><a href=$cart>$cart_class</a></li>";
    echo"<li><a href=$wish>$wish_class</a></li>";
    echo "<li><a href=$home>$signout</a></li>";


} else {
    $login = "login.php";
    $log = "Login";
    echo "<li><a href=$login>$log</a></li>";
}

?>

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

    <input type="checkbox" id="active">
    <label for="active" class="menu-btn"><span></span></label>
    <label for="active" class="close"></label>
    <div class="wrapper">
      <ul>
        <li><a href="summer.php">Summer collection</a></li>
        <li><a href="winter.php">Winter collection</a></li>
        <li><a href="bundle.php">Bundle and save</a></li>
        <li><a href="#">Blog</a></li>
        <li><a href="#">Gifts</a></li>
        <li><a href="#">Reviews</a></li>
        <li><a href="about.php">About us</a></li>
        <li><a href="#">Contact us</a></li>
      </ul>
    </div>
  </nav>

    <section id="aboutUs">
        <div class="cont">
            <h1>This is Sweet Dreams</h1>
            <p>SweetDreams, our baby sleepwear brand, was founded by two sisters who are also mothers. We realized how
                challenging sleepless nights can be for moms and babies during our motherhood journey. In Egypt, we saw
                a lack of information about baby sleep and a shortage of quality sleep products.
            </p>
            <br>

            <p>Inspired by our own experiences as mothers, we set out to create a brand that helps both moms and babies
                sleep better. Our mission is to design safe, unique baby sleepwear that ensures a good night's sleep for
                every baby.
            </p>
            <br>

            <p>
                Our brand is special because we're moms too, and our own babies served as our inspiration. SweetDreams
                is a testament to sisterhood, motherhood, and the commitment to improving the sleep journey for both
                moms and babies in Egypt. We aim to be the guiding light for moms, providing the tools they need for
                their babies to experience sweet, peaceful dreams.
            </p>
    </section>
    <footer class="pageFooter">
        <div class="col">
            <a href="index.php"><img class="Logo" src="imgs/sweet dreams logo-01.png" alt="" width="145"
                    height="100"></a>
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
            <a href="about.php">About us</a>
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