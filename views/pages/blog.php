
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Blog | Sweet Dreams</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link rel="icon" href="../../public/images/sweet dreams logo-01.png" type="image/icon type" />
    <link rel="stylesheet" href="../../public/css/blog.css" />
</head>
<body>

    <nav>
    <?php include '../partials/nav.php'; ?>

    <?php include '../partials/side.php'; ?>
    </nav>

    <?php
 // Start the session


 $sql = "SELECT * FROM blog";
 include_once "../../config.php";
 $result = mysqli_query($conn, $sql);
 ?>
 <div class=title>
    <?php
echo "<h1>Blog</h1>";
?>
 </div>
 <?php 

if (mysqli_num_rows($result) > 0) {
  // Loop through the products and display them dynamically
  while ($row = mysqli_fetch_assoc($result)) {
    $id = $row["id"];
    $blog_img = $row["blog_img"];
    $blog_text = $row["blog_text"];

    // Create a new container for each row
    echo "<div class='container'>";

    // Display the image and text in the container
    echo "<img src='../../public/{$blog_img}' alt='$blog_img' style='width:500px; height:350px;'>";
    echo "<p>$blog_text</p>";

    // Close the container
    echo "</div>";
  }
}

?>

<?php include "../partials/footer.php"?>;

</body>
</html>