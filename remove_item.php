<?php

session_start();

if (isset($_POST['remove_from_wishlist'])) {
$item_index = $_POST['item_index'];


 if (isset($_SESSION['wishlist'][$item_index])) {
unset($_SESSION['wishlist'][$item_index]);
 }


$_SESSION['wishlist'] = array_values($_SESSION['wishlist']);


 header("Location: wishlist.php");
 exit();
}
else if (isset($_POST['remove_from_cart'])) {
    $item_index = $_POST['item_index'];
    
    
     if (isset($_SESSION['cart'][$item_index])) {
    unset($_SESSION['cart'][$item_index]);
     }
    
    
    $_SESSION['cart'] = array_values($_SESSION['cart']);
    
    
     header("Location: cart.php");
     exit();
    }

?>