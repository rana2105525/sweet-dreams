<?php include("../../includes/dbh.inc.php");?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sweet Dreams</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="../css/allProducts.css" />
    <link rel="icon" href="../../imgs/Sweet Dreams logo-01.png"type="image/icon type" />
  </head> 

  <body>
  <div class="component">
      <div class="sidebar rows">
        <a href="../../index.php"><img class ="logo" src="../../imgs/sweet dreams logo-01.png" alt="logo" ></a>
        <a href="addAdmin.php">Add Admin</a>
        <a href="viewAdmin.php">View Admin</a>
        <a href="addProduct.php">Add Product</a>
        <a href="allProducts.php">Products</a>
        <a href="users.php">Users</a>
        <a href="reviews.php">Reviews</a>
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
                    $category = $row["category"];
                    echo '<tr>
                            <td> #'.$id.'</td>
                            <td>'.$title.'</td>
                            <td>'.$price.'</td>
                            <td>'.$description.'</td>
                            <td><img class="table_img" src="'.$prod_image.'"alt='.$title.'/></td>
                            <td>'.$category.'</td>
                            <td>
                              <button class = "buttons" id ="edit" type="">Edit</button>
                              <button class = "buttons" id ="delete" type="">Delete</button>
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