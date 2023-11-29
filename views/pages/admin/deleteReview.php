<?php include("../../../config.php");
include_once "../../../Admin.php";
//The isset() function checks whether a variable is set, which means that it has to be declared and is not NULL.
//used get method because we can access the variables from the url
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];

    // Call the static method from the Admin class to delete the review
    if (Admin::deleteReview($id)) {
        header("location:reviews.php");
    } else {
        die(mysqli_error($conn));
    }
}

?>