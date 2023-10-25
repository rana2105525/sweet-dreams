<?php include("../../../config.php");?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sweet Dreams</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="../../../public/css/admin/allProducts.css" />
    <link rel="icon" href="../../../public/images/Sweet Dreams logo-01.png"type="image/icon type" />
  </head> 

  <body>
  <?php 
      session_start();

      // Check if the user is logged in as an admin
      if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
          // Redirect the user to the login page if not logged in as an admin
          header("Location: /sweet-dreams/views/pages/");
          exit();
      }
      ?>
  <div class="component">
      <div class="sidebar rows">
      <?php include '../../partials/adminSidebar.php';?>
      </div>

      <div class="content">
      <div id="header"><h2>All Products</h2></div>
        <div class="tablecont">
            <table>
              <thead class="tablehead">
                <tr>
                  <th class = "tableHeader">#ID</th>
                  <th class = "tableHeader">Title</th>
                  <th class = "tableHeader">Price</th>
                  <th class = "tableHeader">Description</th>
                  <th class = "tableHeader">Product &nbsp; Image</th>
                  <th class = "tableHeader">Category</th>
                  <th class = "tableHeader">Added &nbsp; at</th>
                  <th class = "tableHeader">Operation</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $sql = "SELECT * FROM products";
                  $result = mysqli_query($conn,$sql);
                   //fetch all data inside the database
                  while($row = mysqli_fetch_assoc($result)){
                    $id = $row["id"];
                    $title = $row["title"];
                    $price = $row["price"];
                    $description = $row["description"];
                    $prod_image = $row["prod_image"];
                    $added_at = $row["added_at"];
                    $category = $row["category"];
                    echo '<tr>
                            <td class ="cell"> #'.$id.'</td>
                            <td class ="cell">'.$title.'</td>
                            <td class ="cell">'.$price.'</td>
                            <td class ="cell">'.$description.'</td>
                            <td><img class="table_img" src="../../../public/'.$prod_image.'"alt='.$title.'/></td>
                            <td class ="cell">'.$category.'</td>
                            <td class ="cell">'.$added_at.'</td>
                            <td>
                              <button class = "buttons" id ="edit"><a href="editProduct.php?update_id='.$id.'">Edit</a></button>
                              <button class = "buttons" id ="delete"><a href="deleteProduct.php?delete_id='.$id.'">Delete</a></button>
                            </td>
                          </tr>';
                  }
                ?>  
              </tbody>
            </table>
        </div>
    </div>
  </div>
  </body>
</html>