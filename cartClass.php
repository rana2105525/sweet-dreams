<?php
$servername = "172.232.217.28";
$username = "root";
$password = "SweetDreams123";
$DB = "sweetdreams";

$conn = mysqli_connect($servername,$username,$password,$DB);

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
class Cart {
    public $id;
    public $email;
    public $items;
    public $quantity;
    public $totalPrice;

    function __construct($id) {
        if ($id != "") {
            $sql = "SELECT reg.email, cart.prod_title, cart.prod_desc, cart.prod_price, cart.prod_image, products.title, products.price, products.description, products.prod_image 
                    FROM reg AND products AND cart
                    JOIN cart ON reg.email = cart.email 
                    JOIN products ON cart.prod_title = products.title 
                      AND cart.prod_desc = products.description 
                      AND cart.prod_price = products.price 
                      AND cart.prod_image = products.prod_image";
            $cart = mysqli_query($GLOBALS['conn'], $sql);
            if ($row = mysqli_fetch_array($cart)) {
                $this->email = $row["email"];
                $this->items = array(
                    'prod_title' => $row['prod_title'],
                    'prod_desc' => $row['prod_desc'],
                    'prod_price' => $row['prod_price'],
                    'prod_image' => $row['prod_image']
                );
                $this->quantity = $row["quantity"];
                $this->totalPrice = $row["total_price"];
                $this->id = $row["id"];
            }
        }
    }
    

    static function addItem($email, $prod_title, $prod_desc, $prod_price, $upload_image, $quantity, $totalPrice) {
        $prod_image = $_FILES['prod_image']; //2D global array
        $image_filename = $prod_image['name']; //get image name
        $image_filetemp = $prod_image['tmp_name']; //get temp path
        $upload_image = 'images/'.$image_filename; //save image inside imgs folder
        $destination = '../../../public/'.$upload_image;
        $query = "SELECT prod_image FROM products WHERE prod_title = '$prod_title' AND prod_desc = '$prod_desc' AND prod_price = '$prod_price'";
$result = mysqli_query($GLOBALS['conn'], $query);

if(mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $upload_image = $row['prod_image'];
}
        move_uploaded_file($image_filetemp, $destination);
        $sql = "INSERT INTO cart (email, prod_title, prod_desc, prod_price, prod_image, quantity, total_price) VALUES ('$email', '$prod_title', '$prod_desc', '$prod_price', '$upload_image', '$quantity', '$totalPrice')";
        if(mysqli_query($GLOBALS['conn'], $sql))
            return true;
        else
            return false;
    }
}

    // public function updateItemQuantity($itemId, $quantity) {
    //     if (isset($this->items[$itemId])) {
    //         $item = $this->items[$itemId]['item'];
    //         $oldQuantity = $this->items[$itemId]['quantity'];
    //         $oldPrice = $this->items[$itemId]['price'];

    //         if ($quantity > 0) {
    //             $this->items[$itemId]['quantity'] = $quantity;
    //             $this->items[$itemId]['price'] = $item->price * $quantity;
    //         } else {
    //             unset($this->items[$itemId]);
    //         }

    //         $this->totalQuantity -= $oldQuantity - $quantity;
    //         $this->totalPrice -= $oldPrice - $item->price * $quantity;
    //     }
    // }

    // public function removeItem($itemId) {
    //     if (isset($this->items[$itemId])) {
    //         $oldQuantity = $this->items[$itemId]['quantity'];
    //         $oldPrice = $this->items[$itemId]['price'];

    //         unset($this->items[$itemId]);

    //         $this->totalQuantity -= $oldQuantity;
    //         $this->totalPrice -= $oldPrice;
    //     }
    // }

    // public function clear() {
    //     $this->items = [];
    //     $this->totalQuantity = 0;
    //     $this->totalPrice = 0;
    // }

?>