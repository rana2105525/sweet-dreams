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
  <?php 
      session_start();
      include("../../../config.php");
      include_once("../../../Admin.php");

      $users = Admin::getAllUsers();

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
                  foreach ($users as $user) {
                    echo '<tr>
                            <td> #' . $user['id'] . '</td>
                            <td>' . $user['name'] . '</td>
                            <td>' . $user['email'] . '</td>
                            <td>' . $user['birth'] . '</td>
                            <td>' . $user['gender'] . '</td>
                            <td>
                                <button class="buttons" id="delete">
                                    <a href="deleteUser.php?delete_id=' . $user['id'] . '">Delete</a>
                                </button>
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