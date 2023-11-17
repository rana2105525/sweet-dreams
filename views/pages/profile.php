<!DOCTYPE html>
<html lang="en">

<head>
  <title>My profile</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
  <link rel="icon" href="imgs/sweet dreams logo-01.png" type="image/icon type" />
  <link rel="stylesheet" href="../../public/css/profile.css" />
</head>

<body>
  
<?php
echo "<h1>Your Profile</h1>";
?>
<?php
session_start();	
include_once "../../User.php";

$UserObject=new User($_SESSION["id"]);



?>
<section class=container>
<form class="form">
<div class="input-box">
<label>Fullname: </label>
<?php
echo " $UserObject->name<br>";

?>
</div>
<div class="input-box">
<label>Email: </label>
<?php
echo " $UserObject->email<br>";

?>
</div>
<?php
include_once "../../User.php";
?>
<button ><a href="edit_info.php"class="button" >Update info</a></button>
<button ><a href="delete_user.php"class="button" >Delete account</a></button>

</form>
</section>
<?php include '../partials/footer.php'; ?>


</body>
</html> 
