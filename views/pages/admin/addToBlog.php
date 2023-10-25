<?php include("../../../config.php");?>
<!DOCTYPE html>
<html lang="en"> 
  <head>
    <title>Add to blog | Sweet Dreams</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="../../../public/css/admin/addToBlog.css" />
    <link rel="icon" href="../../../public/images/Sweet Dreams logo-01.png"type="image/icon type" />
  </head> 
<body>

<?php
 //whenever this submit button is clicked, this functions will be performed 
 if(isset($_POST['submit'])){
    //storing values 
   
    $blog_img =$_FILES['blog_img'];//2D global array
    $blog_text = $_POST['blog_text'];

    $image_filename = $blog_img['name']; //get image name
    $image_filetemp = $blog_img['tmp_name']; //get temp path

      $upload_image='images/'.$image_filename; //save image inside imgs folder
      $destination='../../../public/'.$upload_image;
      move_uploaded_file($image_filetemp,$destination);

      $sql="INSERT INTO blog (blog_img,blog_text)
       VALUES('$upload_image','$blog_text');";
       $result = mysqli_query($conn,$sql);//excute query
       if(!$result)
        die(mysqli_error($conn));
    }
 
?>
<div class ="component">
  <div class="sidebar rows">
  <?php include '../../partials/adminSidebar.php';?>
  </div>

  <div class ="content rows">
  <section class="container">
        <form action="addToBlog.php" class="form" method="post" enctype= "multipart/form-data">
          <div id="header"><h2>Add to blog</h2></div>


          <div class="input-box">
              <label for="blog_img">image</label>
              <input type="file" id="blog_img" name="blog_img" accept =".png,.jpg,.jpeg"/>
          </div>

          <div class="input-box">
              <label for ="blog_text">text</label>
              <textarea id="blog_text" name="blog_text" rows="4" cols="85" placeholder="Enter text"></textarea>
          </div> 

          <button type="submit" name="submit">Add to blog</button>
        </div>

         
        </form>
      </section>
  </div>
</div>

  </body>
</html>