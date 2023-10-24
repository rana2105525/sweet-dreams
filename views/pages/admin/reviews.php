<?php include("../../../config.php");?>
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
      </div>

      <div class="content">
      <div id="header"><h2>Customers' &nbsp; Reviews</h2></div>
        <div class="tablecont">
            <table>
              <thead class="tablehead">
                <tr>
                  <th class = "tableHeader">User &nbsp; name</th>
                  <th class = "tableHeader">User &nbsp; Review</th>
                  <th class = "tableHeader">Added &nbsp; At</th>
                  <th class = "tableHeader">Operation</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $sql = "SELECT * FROM reviews";
                  $result = mysqli_query($conn,$sql);
                   //fetch all data inside the database
                  while($row = mysqli_fetch_assoc($result)){
                    $id = $row["id"];
                    $fullname = $row["fullname"];
                    $review = $row["review"];
                    $added_at = $row["added_at"];
                    echo '<tr>
                            <td>'.$fullname.'</td>
                            <td>'.$review.'</td>
                            <td>'.$added_at.'</td>
                            <td>
                              <form action="" method="post">
                                <button><a href="deleteReview.php?delete_id='.$id.'">Delete</button>
                              </form>
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