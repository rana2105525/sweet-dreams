<?php include("productClass.php");?>
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
      // session_start();

      // // Check if the user is logged in as an admin
      // if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
      //     // Redirect the user to the login page if not logged in as an admin
      //     header("Location: /sweet-dreams/views/pages/");
      //     exit();
      // }
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
                Products::getProducts();
                ?>  
              </tbody>
            </table>
        </div>
    </div>
  </div>
  </body>
</html>