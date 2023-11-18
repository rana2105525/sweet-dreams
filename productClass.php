<?php
$servername = "172.232.217.28";
$username = "root";
$password = "SweetDreams123";
$DB = "sweetdreams";

$conn = mysqli_connect($servername,$username,$password,$DB);

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
class Product
{
    public $id;
    public $title;
    public $price;
    public $description;
    public $prod_image;
    public $category; 

    function __construct($id)	{
		if ($id !=""){
			$sql="select * from products where 	id=$id";
			$Prod = mysqli_query($GLOBALS['conn'],$sql);
			if ($row = mysqli_fetch_array($Prod)){
				$this->title=$row["title"];
				$this->price=$row["price"];
                $this->description=$row["description"];
                $this->prod_image=$row["prod_image"];
                $this->category=$row["category"];
				$this->id=$row["id"];
				// $this->UserType_obj=new UserType($row["UserType_id"]);
			}
		}
	}

    static function InsertinDB_Static($title,$price,$description,$upload_image,$category)	{
     $title = $_POST['title'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $prod_image =$_FILES['prod_image'];//2D global array
    $category = $_POST['category'];
    $image_filename = $prod_image['name']; //get image name
    $image_filetemp = $prod_image['tmp_name']; //get temp path
    $upload_image='images/'.$image_filename; //save image inside imgs folder
    $destination='../../../public/'.$upload_image;
    move_uploaded_file($image_filetemp,$destination);
		$sql="insert into products(title,price,description,prod_image,category) values ('$title','$price','$description','$upload_image','$category')";
		if(mysqli_query($GLOBALS['conn'],$sql))
			return true;
		else
			return false;
	}

 
}



?>