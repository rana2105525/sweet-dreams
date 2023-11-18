<?php
session_start();  
include_once "../../User.php";

$login = "login.php";
$log = "Login";
$cart = "cart.php";
$cart_class = "Cart";
$wish = "wishlist.php";
$wish_class = "Wishlist";

if (isset($_SESSION["id"])) {
    $UserObject = new User($_SESSION["id"]);
    $profile = "profile.php";
    $signout = "Logout";

    echo "<div class='wrapper1'>";
    echo "<div class='logo'><a href='index.php'><img src='../../public/images/sweet dreams logo-01.png' alt='logo'></a></div>";
    echo "<ul class='nav-links'>";
    echo "<li><a href='$profile'>$UserObject->name</a></li>";
    echo "<li><a href='$cart'>$cart_class</a></li>";
    echo "<li><a href='$wish'>$wish_class</a></li>";
    echo "<li><a href='#' onclick='event.preventDefault(); document.getElementById(\"logout-form\").submit();'>$signout</a></li>";
    echo "</ul>";
    echo "</div>";
} else {
    echo "<div class='wrapper1'>";
    echo "<div class='logo'><a href='index.php'><img src='../../public/images/sweet dreams logo-01.png' alt='logo'></a></div>";
    echo "<ul class='nav-links'>";
    echo "<li><a href='$login'>$log</a></li>";
    echo "</ul>";
    echo "</div>";
}
?>

<form id="logout-form" action="" method="POST" style="display: none;">
    <?php
    // You might want to include CSRF token or confirmation inputs here
    // Example: <input type="hidden" name="csrf_token" value="your_token_here">
    ?>
    <input type="hidden" name="logout" value="1">
</form>

<?php
// Check if the logout form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["logout"])) {
    if (isset($_SESSION["id"])) {
        $UserObject = new User($_SESSION["id"]);
        $UserObject->logout(); // Call the logout method from User class
    }
}
?>
