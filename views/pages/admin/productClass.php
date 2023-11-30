<?php
include '../../../dbh.php';

class Products extends Dbh{
    private static $id;
    private static $title;
    private static $description;
    private static $prod_image;
    private static $added_at;
    private static $category;
    private static $price;
    
    public function __construct($id){
		if ($id !=""){
			$sql="select * from products where 	id=$id";
			$result = mysqli_query(self::connect(),$sql);
			if ($row = mysqli_fetch_assoc($result)){
				self::$id=$row["id"];
				self::$title=$row["title"];
				self::$description=$row["description"];
				self::$category=$row["category"];
				self::$price=$row["price"];
				self::$prod_image=$row["prod_image"];
				self::$added_at=$row["added_at"];
			}
		}
	}

    public static function getProducts(){
        $sql = "SELECT * FROM products";
        $result = mysqli_query(self::connect(),$sql);
        //fetch all data inside the database
        while($row = mysqli_fetch_assoc($result)){
         self::$id = $row["id"];
         self::$title = $row["title"];
         self::$price = $row["price"];
         self::$description = $row["description"];
         self::$prod_image = $row["prod_image"];
         self::$added_at = $row["added_at"];
         self::$category = $row["category"];
         echo '<tr>
                 <td class ="cell"> #'.self::$id.'</td>
                 <td class ="cell">'.self::$title.'</td>
                 <td class ="cell">'.self::$price.'</td>
                 <td class ="cell">'.self::$description.'</td>
                 <td><img class="table_img" src="../../../public/'.self::$prod_image.'"alt='.self::$title.'/></td>
                 <td class ="cell">'.self::$category.'</td>
                 <td class ="cell">'.self::$added_at.'</td>
                 <td>
                   <button class = "buttons" id ="edit"><a href="editProduct.php?update_id='.self::$id.'">Edit</a></button>
                   <button class = "buttons" id ="delete"><a href=deleteProduct.php?delete_id='.self::$id.'">Delete</a></button>
                 </td>
               </tr>';
        }
    }

    public static function insertProducts($title,$price,$description,$upload_image,$category){
        $sql="INSERT INTO products(title,price,description,prod_image,category)
            VALUES ('$title','$price','$description','$upload_image','$category')";
        if(mysqli_query(self::connect(),$sql))
            return true;
        else return false;
    }

    public static function deleteProduct($id){
        $escapedID = mysqli_real_escape_string(self::connect(), self::$id);
        echo $escapedID;
        //$sql = "DELETE FROM products WHERE id = '$escapedID'";
        // if(mysqli_query(self::connect(), $sql))
        //     return true;
        // else return false;
    }
 

}   