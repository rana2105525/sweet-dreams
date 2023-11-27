<!DOCTYPE html>
<html lang="en">

<head>
    <title>My cart | Sweet Dreams</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link rel="icon" href="../../public/images/Sweet Dreams logo-01.png" type="image/icon type" />
    <link rel="stylesheet" href="../../public/css/cart.css" />
</head>

<body>
    <nav>
        <?php include '../partials/nav.php'; ?>
        <?php include '../partials/side.php'; ?>
    </nav>

    <?php
    include_once '../../cartClass.php';
    include_once '../../productClass.php'; // Make sure to include the Product class

    $cart = new Cart();

    if (!empty($_POST['cart'])) {
        $cart->productsQuantity = json_decode($_POST['cart'], true);
    }

    if (!empty($_GET["action"])) {
        switch ($_GET["action"]) {
            case "add":
                if (!empty($_POST["quantity"])) {
                    $cart->addProduct($_GET["id"], $_POST["quantity"]);
                }
                break;
            case "remove":
                $cart->removeProduct($_GET["id"]);
                break;
            case "empty":
                $cart->emptyCart();
                break;
        }
    }
    ?>

    <div id="shopping-cart">
        <div class="txt-heading">
            Shopping Cart <a id="btnEmpty" href="index.php?action=empty">Empty Cart</a>
        </div>
        <?php
        $total_quantity = 0;
        $total_price = 0;

        if (count($cart->productsQuantity) > 0) {
        ?>
            <table cellpadding="10" cellspacing="1">
                <tr>
                    <th><strong>Name</strong></th>
                    <th><strong>Quantity</strong></th>
                    <th><strong>Price</strong></th>
                    <th><strong>Action</strong></th>
                </tr>
                <?php
                foreach ($cart->productsQuantity as $productID => $quantity) {
                    // Assuming you have a Product class with a method getDetailsById
                    $product = Product::getDetailsById($productID);
                    if ($product) {
                ?>
                        <tr>
                            <td><?php echo $product->name; ?></td>
                            <td><?php echo $quantity; ?></td>
                            <td><?php echo "$" . $product->price; ?></td>
                            <td><a href="index.php?action=remove&id=<?php echo $productID; ?>">Remove Item</a></td>
                        </tr>
                <?php
                        $total_quantity += $quantity;
                        $total_price += ($product->price * $quantity);
                    }
                }
                ?>
                <tr>
                    <td colspan="2" align="right">Total:</td>
                    <td align="right"><?php echo $total_quantity; ?></td>
                    <td align="right" colspan="2"><strong><?php echo "$" . $total_price; ?></strong></td>
                    <td></td>
                </tr>
            </table>
        <?php } ?>
    </div>

    <?php include '../partials/footer.php'; ?>

</body>

</html>
