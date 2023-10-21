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