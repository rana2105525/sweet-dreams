<?php
class DB {
	private $host = "localhost:3303";
	private $user = "root";
	private $password = "";
	private $database = "lab06";
	public $conn;

	function __construct() {
		$this->conn = $this->connectDB();
	}

	function connectDB() {
		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		return $conn;
	}
}

class Product {
	public $id;
	public $name;
	public $image;
	public $price;
	public $options;
	function __construct($id) {
		$db_handle = new DB();
		$sql="SELECT * FROM product WHERE id=".$id;

		$result = $db_handle->conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $this->id = $row["id"];
            $this->name = $row["name"];
            $this->image = $row["image"];
            $this->price = $row["Price"];
			$this->options =array();
		}
		$sql="SELECT product.Name,product.price
		FROM cart 
		INNER JOIN product ON product.ID = cart.prod_id
		INNER JOIN reg ON reg.id = cart.user_id
		WHERE product_id=".$id;
		$result = mysqli_query($db_handle->conn,$sql);
		while($row = mysqli_fetch_array($result)){
			$this->options[$row['Name']] = $row[1];
		}
	}


	static function getAllProducts()	{
		

		$db_handle = new DB();
        $query = "SELECT * FROM product";
        $result = $db_handle->conn->query($query);
        $products = array();
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $product = new Product($row["id"]);
                $products[] = $product;
            }
        }
        return $products;
	}
}
class Cart{
	public $productsQuantity;

	function __construct(){
		$this->productsQuantity=array();
	}
	function addProduct($productID,$q){		
		if(array_key_exists((string)$productID,$this->productsQuantity)){
			$this->productsQuantity[(string)$productID] += $q;
		}
		else{
			$this->productsQuantity[(string)$productID] = $q;
		}
	}

    function removeProduct($productID){
		unset($this->productsQuantity[(string)$productID]);
	}

	function emptyCart(){
		unset($this->productsQuantity);
		$this->productsQuantity=array();
	}
}

?>