<?php
 //whenever this submit button is clicked, this functions will be performed 
 if(isset($_POST['submit'])){
    //storing values 
    $title = $_POST['title'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $prod_image =$_FILES['prod_image'];//2D global array
    $category = $_POST['category'];

    $image_filename = $prod_image['name']; //get image name
    $image_filetemp = $prod_image['tmp_name']; //get temp path
    $filename_separate=explode('.',$image_filename);  //separate name by dot(array)
    $file_extension=strtolower(end($filename_separate)); //get file extension
    $extensions = array('jpg', 'jpeg', 'png'); //extensions 

    if(in_array($file_extension,$extensions)){
      $upload_image='uploads/'.$image_filename; //save image inside uploads folder
      move_uploaded_file($image_filetemp,$upload_image);

      $sql="UPDATE products SET ";
      $result = mysqli_query($conn,$sql);//excute query
      if(!$result)
        die(mysqli_error($conn));
    }
 }
?>