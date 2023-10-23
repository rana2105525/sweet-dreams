<?php include("../../includes/dbh.inc.php");?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sweet Dreams</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="../css/reviews.css" />
    <link rel="icon" href="../../imgs/Sweet Dreams logo-01.png"type="image/icon type" />
  </head> 

  <body>
  <div class="component">
      <div class="sidebar rows">
        <a href="../../index.php"><img class ="logo" src="../../imgs/sweet dreams logo-01.png" alt="logo" ></a>
        <a href="addAdmin.php">Add Admin</a>
        <a href="viewAdmin.php">Admin</a>
        <a href="addProduct.php">Add Product</a>
        <a href="allProducts.php">Products</a>
        <a href="users.php">Users</a>
        <a href="allAdmins.php">Admins</a>
        <a href="reviews.php">Reviews</a>
      </div>

      <div class="content">
      <div id="header"><h2>Users' &nbsp; Reviews</h2></div>
        <div class="tablecont">
            <table>
              <thead class="tablehead">
                <tr>
                  <th class = "tableHeader">#User &nbsp; ID</th>
                  <th class = "tableHeader">User &nbsp; name</th>
                  <th class = "tableHeader">Product &nbsp; title</th>
                  <th class = "tableHeader">Product &nbsp; Image</th>
                  <th class = "tableHeader">Review</th>
                  <th class = "tableHeader">Operation</th>
                </tr>
              </thead>
              <tbody>

             <td> #45 </td>
             <td>sara</td>
             <td>little monster baby home pyjamas</td>
             <td> <img class="table_img" src="../../imgs/t-shirt-pajamas-carters-boy-clothing-little-monster-baby-home-pajamas-f14325570f638347c4aa1cccd0ca5e3f.png"/></td>
             <td>Perfect material</td>
             <td>
                <button class = "buttons" id ="delete" type="">Delete</button>
             </td>
                <?php
                //   $sql = "SELECT * FROM products";
                //   $result = mysqli_query($conn,$sql);
                //    //fetch all data inside the database
                //   while($row = mysqli_fetch_assoc($result)){
                //     $id = $row["id"];
                //     $title = $row["title"];
                //     $price = $row["price"];
                //     $description = $row["description"];
                //     $prod_image = $row["prod_image"];
                //     $category = $row["category"];
                //     echo '<tr>
                //             <td> #'.$id.'</td>
                //             <td>'.$title.'</td>
                //             <td>'.$price.'</td>
                //             <td>'.$description.'</td>
                //             <td><img class="table_img" src="'.$prod_image.'"alt='.$title.'/></td>
                //             <td>'.$category.'</td>
                //             <td>
                //               <form action="editProduct.php" method="post">
                //                 <button class = "buttons" id ="edit" type="">Edit</button>
                //               </form>
                //               <form action="deleteProduct.php" method="post">
                //                 <button class = "buttons" id ="delete" type="">Delete</button>
                //               </form>
                //             </td>
                //           </tr>';
                //   }
                ?>
              </tbody>
            </table>
        </div>
    </div>
  </div>
  </body>
</html>