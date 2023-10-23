<?php include("../../includes/dbh.inc.php");?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sweet Dreams</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="../css/allAdmins.css" />
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
      <div id="header"><h2>Admins</h2></div>
        <div class="tablecont">
            <table>
              <thead class="tablehead">
                <tr>
                  <th class = "tableHeader">#ID</th>
                  <th class = "tableHeader">Name</th>
                  <th class = "tableHeader">Email</th>
                  <th class = "tableHeader">Phone &nbsp; Number</th>
                  <th class = "tableHeader">Gender</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $sql = "SELECT * FROM admins";
                  $result = mysqli_query($conn,$sql);
                   //fetch all data inside the database
                  while($row = mysqli_fetch_assoc($result)){
                    $id = $row["ID"];
                    $name = $row["Username"];
                    $email = $row["Email"];
                    $phoneNumber = $row["Phone"];
                    $gender = $row["Gender"];
                    echo '<tr>
                            <td> #'.$id.'</td>
                            <td>'.$name.'</td>
                            <td>'.$email.'</td>
                            <td>'.$phoneNumber.'</td>
                            <td>'.$gender.'</td>
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