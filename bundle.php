<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bundle and save | Sweet Dreams</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link rel="icon" href="imgs/sweet dreams logo-01.png" type="image/icon type" />
    <link rel="stylesheet" href="bundle.css" />
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
                    echo "<li><a href=$profile>$fullname</a></li>";
                    echo "<li><a href=$home>$signout</a></li>";


                } else {
                    $login = "login.php";
                    $log = "Login";
                    echo "<li><a href=$login>$log</a></li>";
                }

                ?>
                <li><a href="index.php">Home</a></li>
                <li><a href="#"><i class="fa fa-shopping-bag"></i></a></li>
                <li><a href="#"><i class="fa fa-heart"></i></a></li>


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
    <h2>Bundle and save collection</h2>

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
    <div class="our_Products">
        <table>
            <tr>
                <div class="products">

                    <div class="prod">
                        <img src="imgs/Copy of Omar & Asia8.jpg" alt="bed1">

                        <div class="design">
                            <h5>Suret osyy</h5>
                            <h6>ay haga</h6>
                            <button class="btn"> <i class="fa fa-shopping-bag"></i></button>
                            <button class="btn"> <i class="fa fa-heart"></i></button>
                        </div>
                    </div>
                    <div class="prod">
                        <img src="imgs/Copy of Omar & Asia8.jpg" alt="bed2">

                        <div class="design">
                            <h5>Suret osyy</h5>
                            <h6>ay haga</h6>
                            <button class="btn"> <i class="fa fa-shopping-bag"></i></button>
                            <button class="btn"> <i class="fa fa-heart"></i></button>
                        </div>
                    </div>
                    <div class="prod">
                        <img src="imgs/Copy of Omar & Asia8.jpg " alt="bed3">

                        <div class="design">
                            <h5>Suret osyy</h5>
                            <h6>ay haga</h6>
                            <button class="btn"> <i class="fa fa-shopping-bag"></i></button>
                            <button class="btn"> <i class="fa fa-heart"></i></button>
                        </div>
                    </div>


                    <div class="prod">
                        <img src="imgs/Copy of Omar & Asia8.jpg " alt="bed4">

                        <div class="design">
                            <h5>Suret osyy</h5>
                            <h6>ay haga</h6>
                            <button class="btn"> <i class="fa fa-shopping-bag"></i></button>
                            <button class="btn"> <i class="fa fa-heart"></i></button>
                        </div>
                    </div>
                    </td>
            </tr>

            <tr>
                <td>
                    <div class="prod">
                        <img src="imgs/Copy of Omar & Asia8.jpg ">
                        <div class="design">
                            <h5>Suret osyy</h5>
                            <h6>ay haga</h6>
                            <button class="btn"> <i class="fa fa-shopping-bag"></i></button>
                            <button class="btn"> <i class="fa fa-heart"></i></button>
                        </div>
                    </div>
                </td>

                <td>
                    <div class="prod">
                        <img src="imgs/Copy of Omar & Asia8.jpg">
                        <div class="design">
                            <h5>Suret osyy</h5>
                            <h6>ay haga</h6>
                            <button class="btn"> <i class="fa fa-shopping-bag"></i></button>
                            <button class="btn"> <i class="fa fa-heart"></i></button>
                        </div>
                    </div>
                </td>

                <td>
                    <div class="prod">
                        <img src="imgs/Copy of Omar & Asia8.jpg">
                        <div class="design">
                            <h5>Suret osyy</h5>
                            <h6>ay haga</h6>
                            <button class="btn"> <i class="fa fa-shopping-bag"></i></button>
                            <button class="btn"> <i class="fa fa-heart"></i></button>
                        </div>
                    </div>
                </td>
            </tr>
        </table>
    </div>









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