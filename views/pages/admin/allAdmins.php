<?php
include("../../../config.php");
include_once("../../../Admin.php");

$admins = Admin::getAllAdmins();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sweet Dreams</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="../../../public/css/admin/allAdmins.css" />
    <link rel="icon" href="../../../public/images/Sweet Dreams logo-01.png"type="image/icon type" />
  </head> 

  <body>
  <div class="component">
      <div class="sidebar rows">
      <?php include '../../partials/adminSidebar.php';?>
      <?php 
      session_start();

      // // Check if the user is logged in as an admin
      // if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
      //     // Redirect the user to the login page if not logged in as an admin
      //     header("Location: /sweet-dreams/views/pages/login.php");
      //     exit();
      // }
      ?>
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
                        foreach ($admins as $admin) {
                            echo '<tr>
                                    <td> #' . $admin['ID'] . '</td>
                                    <td>' . $admin['Username'] . '</td>
                                    <td>' . $admin['Email'] . '</td>
                                    <td>' . $admin['Phone'] . '</td>
                                    <td>' . $admin['Gender'] . '</td>
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