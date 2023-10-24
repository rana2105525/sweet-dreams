<!--displaying from db-->
<?php include("../../../config.php");?>
<!DOCTYPE html>
<html lang="en"> 
  <head>
    <title>Sweet Dreams</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="../../../public/css/admin/editProduct.css" />
    <link rel="icon" href="../../../public/images/Sweet Dreams logo-01.png"type="image/icon type" />
  </head> 
<body>

<?php
  //whenever this submit button is clicked, these functions will be performed 
  $id= $_GET ["update_id"];//taken from url
  $query="SELECT * FROM products WHERE id = '$id';";
  $result = mysqli_query($conn,$query);

  $row = mysqli_fetch_assoc($result);
  $title= $row ["title"];
  $price= $row ["price"];
  $description= $row ["description"];
  $prod_image= $row ["prod_image"];
  $category= $row ["category"];

 //whenever this submit button is clicked, this functions will be performed 
 if(isset($_POST['update'])){
    //storing values 
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

    if($image_filename!=""){
      $sql="UPDATE products SET title = '$title',price='$price',
      description='$description',prod_image='$upload_image',category='$category' WHERE id='$id';";
      $result = mysqli_query($conn,$sql);//excute query
      if($result)
        header("Location: allProducts.php");  
      else die(mysqli_error($conn));
    }
    else{
      $sql="UPDATE products SET title = '$title',price='$price',
      description='$description',category='$category' WHERE id='$id';";
      $result = mysqli_query($conn,$sql);//excute query
      if($result)
        header("Location: allProducts.php");  
      else die(mysqli_error($conn));
    }


 }
?>

<div class ="component">
  <div class="sidebar rows">
    <?php include '../../partials/adminSidebar.php';?>
  </div>

  <div class ="content rows">
  <section class="container">
        <form action="" class="form" method="post" enctype= "multipart/form-data">
          <div id="header"><h2>Edit product</h2></div>

          <div class="input-box">
              <label for ="title">Product Title</label>
              <input type="text" id="title" name="title" value="<?php echo $title?>" />
          </div>

          <div class="input-box">
              <label for="price" >Product price</label>
              <input type="number" step="any" id ="price" name ="price" value="<?php echo $price?>" />
          </div>

          <div class="input-box">
              <label for ="description">Product description</label>
              <textarea id="description" name="description" rows="4" cols="85"><?php echo $title?></textarea>
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
            <input type="radio" name="category" id="Winter_Collection" value="Winter_Collection" <?php if($category == "Winter_Collection") echo 'checked="checked"';?>>
            <label for ="Winter_Collection" >Winter Collection</label>
          </div>
          <div>
            <input type="radio" name="category" id="Summer_Collection" value="Summer_Collection" <?php if($category == "Summer_Collection") echo 'checked="checked"';?>>
            <label for ="Summer_Collection" >Summer Collection</label>
          </div>        
          <div>
            <input type="radio" name="category" id="Bundle" value="Bundle" <?php if($category == "Bundle") echo 'checked="checked"';?>>
            <label for ="Bundle" >Bundle</label>
          </div>
        </div>

          <button type="submit" name="update">Update Product</button>
        </form>
      </section>
  </div>
</div>

  </body>
</html>















