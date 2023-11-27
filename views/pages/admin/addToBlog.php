
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
include_once "../../../config.php";
include_once "../../../Admin.php";
session_start();


// // Check if the user is logged in as an admin
// if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
//     // Redirect the user to the login page if not logged in as an admin
//     header("Location: /sweet-dreams/views/pages/");
//     exit();
// }
 

 if(isset($_POST['submit'])){
  $blog_img = $_FILES['blog_img'];
  $blog_text = $_POST['blog_text'];

  
  if(Admin::addToBlog($blog_img, $blog_text)) {
      header("Location: addtoblog.php"); // Redirect to the same page or any other page
      exit();
  }
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