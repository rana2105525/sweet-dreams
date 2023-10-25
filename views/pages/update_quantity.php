<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_quantity'])) {
    $itemIndex = $_POST['item_index'];
    $newQuantity = $_POST['quantity'];

    // Validate the new quantity (you might want to add more validation logic here)
    if ($newQuantity <= 0) {
        // Invalid quantity, you can handle this scenario as per your requirements
        // For example, redirect back to the cart page with an error message
        header("Location: cart.php?error=InvalidQuantity");
        exit();
    }

    // Update the quantity for the specified item in the cart
    if (isset($_SESSION['cart'][$itemIndex])) {
        $_SESSION['cart'][$itemIndex]['quantity'] = $newQuantity;

        // Recalculate the total price based on the new quantity
        $_SESSION['cart'][$itemIndex]['total'] = $_SESSION['cart'][$itemIndex]['price'] * $newQuantity;

        // Redirect back to the cart page after updating the quantity
        header("Location: cart.php");
        exit();
    } else {
        // Invalid item index, handle this scenario as per your requirements
        // For example, redirect back to the cart page with an error message
        header("Location: cart.php?error=InvalidItemIndex");
        exit();
    }
} else {
    // Invalid request, handle this scenario as per your requirements
    // For example, redirect back to the cart page with an error message
    header("Location: cart.php?error=InvalidRequest");
    exit();
}
?>
