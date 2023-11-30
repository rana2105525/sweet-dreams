<?php include("reviewClass.php");?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sweet Dreams</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="../../../public/css/admin/reviews.css" />
    <link rel="icon" href="../../../public/images/Sweet Dreams logo-01.png"type="image/icon type" />
  </head> 
 
  <body>
  <div class="component">
      <div class="sidebar rows">
      <?php include '../../partials/adminSidebar.php';?>
      <?php 
      session_start();

      // Check if the user is logged in as an admin
      // if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
      //     // Redirect the user to the login page if not logged in as an admin
      //     header("Location: /sweet-dreams/views/pages/");
      //     exit();
      // }
      ?>
      </div>

      <div class="content">
      <div id="header"><h2>Customers' &nbsp; Reviews</h2></div>
        <div class="tablecont">
            <table>
              <thead class="tablehead">
                <tr>
                  <th class = "tableHeader">User &nbsp; name</th>
                  <th class = "tableHeader">User &nbsp; Review</th>
                  <th class = "tableHeader">Operation</th>
                </tr>
              </thead>
              <tbody>
                <?php
                Review::getReviews();
                ?>
              </tbody>
            </table>
        </div>
    </div>
  </div>
  </body>
</html>