<?php include("../../../config.php");?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sweet Dreams</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="../../../public/css/admin/users.css" />
    <link rel="icon" href="../../../public/images/Sweet Dreams logo-01.png"type="image/icon type" />
  </head> 

  <body>
  <div class="component">
  <div class="sidebar rows">
      <?php include '../../partials/adminSidebar.php';?>
      </div>
      <div class="content">
      <div id="header"><h2>All Users</h2></div>
        <div class="tablecont">
            <table>
              <thead class="tablehead">
                <tr>
                  <th class = "tableHeader">#ID</th>
                  <th class = "tableHeader">Full Name</th>
                  <th class = "tableHeader">Email</th>
                  <th class = "tableHeader">Date of Birth</th>
                  <th class = "tableHeader">Gender</th>
                  <th class = "tableHeader">Operation</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $sql = "SELECT * FROM registrations";
                  $result = mysqli_query($conn,$sql);
                   //fetch all data inside the database
                  while($row = mysqli_fetch_assoc($result)){
                    $id = $row["id"];
                    $fullname = $row["fullname"];
                    $email = $row["email"];
                    $birth = $row["birth"];
                    $gender = $row["gender"];
                    echo '<tr>
                            <td> #'.$id.'</td>
                            <td>'.$fullname.'</td>
                            <td>'.$email.'</td>
                            <td>'.$birth.'</td>
                            <td>'.$gender.'</td>
                            <td>
                              <button class = "buttons" id ="delete"><a href="deleteUser.php?delete_id='.$id.'">Delete</a></button>
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