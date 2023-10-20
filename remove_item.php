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

?>