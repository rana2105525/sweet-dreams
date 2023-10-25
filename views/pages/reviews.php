
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Reviews | Sweet Dreams</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link rel="icon" href="../../public/images/sweet dreams logo-01.png" type="image/icon type" />
    <link rel="stylesheet" href="../../public/css/reviews.css" />
</head>
<body>

    <nav>
    <?php include '../partials/nav.php'; ?>

    <?php include '../partials/side.php'; ?>
    </nav>

    <?php
 // Start the session


 $sql = "SELECT * FROM reviews";
 include_once "../../config.php";
 $result = mysqli_query($conn, $sql);
 ?>
 <div class=title>
    <?php
echo "<h1>Customers reviews</h1>";
?>
 </div>
<?php 
if (mysqli_num_rows($result) > 0) {
  // Loop through the products and display them dynamically
  while ($row = mysqli_fetch_assoc($result)) {
    $id=$row["id"];
    $fullname = $row["fullname"];
    $review = $row["review"];

    // Create a new container for each row
    echo "<div class='container'>";

    // Display the fullname and review in the container
    echo "<label><strong>$fullname</strong></label>";
    echo "<p>$review</p>";

    // Close the container
    echo "</div>";
  }
}
?>
<?php include "../partials/footer.php"?>;

</body>
</html>