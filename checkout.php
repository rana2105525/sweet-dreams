<!DOCTYPE html>
<html lang="en">

<head>
    <title>Checkout</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link rel="icon" href="imgs/sweet dreams logo-01.png" type="image/icon type" />
    <link rel="stylesheet" href="checkout.css" />
</head>

<body>
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

    <br>
    <br>
    <br>
    <h1>Checkout</h1>
    <section class="container">
        <form method="post" class="form" action="">
        <div class="input-box">
                <label>First name</label>
                <input type="text" name="fname"  required />
            </div>
            <div class="input-box">
                <label>Last name</label>
                <input type="text" name="lname"  required />
            </div>
            <div class="input-box">
                <label>Email</label>
                <input type="text" name="email"  required />
            </div>
            <div class="input-box">
                <label>Phone number</label>
                <input type="text" name="phone"  required />
                
            </div>
            <div class="input-box">
                <label>Address</label>
                <input type="text" name="address"  required />  

            </div>
            <div class="input-box">
                <label>Card holder</label>
                <input type="text" name="cardHolder"  required />
                

            </div>
            <div class="input-box">
                <label>Card number</label>
                <input type="text" name="cardNum"  required />
            </div>
            <div class="input-box">
                <label>Expiring date</label>
                <input type="date" name="exp_date"  required />
            </div>
            <div class="input-box">
                <label>CVC</label>
                <input type="text" name="CVC"  required />
            </div>

            </div>
            </div>


            <button input type="submit" name="submit" value="Submit">Checkout</button>
        </form>
    </section>
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