<!--displaying from db-->
<?php include("../../../config.php");?>
<!DOCTYPE html>
<html lang="en"> 
  <head>
    <title>Sweet Dreams</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="../../../public/css/admin/addProduct.css" />
    <link rel="icon" href="../../../public/images/Sweet Dreams logo-01.png"type="image/icon type" />
  </head> 
<body>

<?php
 //whenever this submit button is clicked, this functions will be performed 
//  if(isset($_POST['submit'])){
//     //storing values 
//     $title = $_POST['title'];
//     $price = $_POST['price'];
//     $description = $_POST['description'];
//     $prod_image =$_FILES['prod_image'];//2D global array
//     $category = $_POST['category'];

//     $image_filename = $prod_image['name']; //get image name
//     $image_filetemp = $prod_image['tmp_name']; //get temp path

//       $upload_image='images/'.$image_filename; //save image inside imgs folder
//       $destination='../../../public/'.$upload_image;
//       move_uploaded_file($image_filetemp,$destination);

//       $sql="INSERT INTO products (title,price,description,prod_image,category)
//        VALUES('$title','$price','$description','$upload_image','$category');";
//        $result = mysqli_query($conn,$sql);//excute query
//        if(!$result)
//         die(mysqli_error($conn));
//     }
 
?>
<!--validation-->
<?php
      // if ($_SERVER["REQUEST_METHOD"] === "POST") {
      //     $productName = $_POST['title'];
      //     $productPrice = $_POST['price'];
      //     $productDescription = $_POST['description'];
      
      //     if (empty($productName) || empty($productPrice) || empty($productDescription)) {
      //         echo "<p style='color: red;'>All fields are required.</p>";
      //     } elseif (!ctype_alpha($productName)) {
      //         echo "<p style='color: red;'>Product title should contain only words.</p>";
      //     } elseif (!ctype_digit($productPrice)) {
      //         echo "<p style='color: red;'>Product price should be a number.</p>";
      //     } elseif (!ctype_alpha($productDescription)) {
      //         echo "<p style='color: red;'>Product description should contain only words.</p>";
      //     } elseif (empty($_FILES['prod_image']['title'])) {
      //         echo "<p style='color: red;'>Please upload a product image.</p>";}
          // } else {
          //  
          //     echo "<p>Product Title: $productName</p>";
          //     echo "<p>Product Price: $productPrice</p>";
          //     echo "<p>Product Description: $productDescription</p>";
          // }
      //}


include_once "../../../productClass.php";
      
if(isset($_POST['submit'])){ //check if form was submitted

	$title=$_POST['title'];
	$price=$_POST['price'];
  $description=$_POST['description'];
  $prod_image=$_FILES['prod_image'];
  $category=$_POST['category'];
	
	if(Product::InsertinDB_Static($title,$price,$description,$upload_image,$category)){
		header("Location:index.php");
	}
	
}
?>

<div class ="component">
  <div class="sidebar rows">
  <?php include '../../partials/adminSidebar.php';?>
  </div>

  <div class ="content rows">
  <section class="container">
        <form action="addProduct.php" class="form" method="post" enctype= "multipart/form-data">
          <div id="header"><h2>Add a new product</h2></div>

          <div class="input-box">
              <label for ="title">Product Title</label>
              <input type="text" id="title" name="title" placeholder="Enter product's title" />
          </div>

          <div class="input-box">
              <label for="price" >Product price</label>
              <input type="number" step="any" id ="price" name ="price" placeholder="Enter product's price" />
          </div>

          <div class="input-box">
              <label for ="description">Product description</label>
              <textarea id="description" name="description" rows="4" cols="85" placeholder="Enter product's description"></textarea>
          </div> 

          <div class="input-box">
              <label for="prod_image">Product image</label>
              <input type="file" id="prod_image" name="prod_image" accept =".png,.jpg,.jpeg"/>
          </div>

          <div class="input-box">
              <label for ="category">Category</label>
          </div> 
        <div>
          <div>
            <input type="radio" name="category" id="Winter_Collection" value="Winter_Collection">
            <label for ="Winter_Collection" >Winter Collection</label>
          </div>
          <div>
            <input type="radio" name="category" id="Summer_Collection" value="Summer_Collection">
            <label for ="Summer_Collection" >Summer Collection</label>
          </div>        
          <div>
            <input type="radio" name="category" id="Bundle" value="Bundle">
            <label for ="Bundle" >Bundle</label>
          </div>
        </div>

          <button type="submit" name="submit">Add Product</button>
        </form>
      </section>
  </div>
</div>

  </body>
</html>