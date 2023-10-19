<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){ //check if form is submitted
    //grab data
    $title = $_POST["title"];
    $price = $_POST["price"];
    $description = $_POST["description"];
    $category = $_POST["category"];


}else{
    echo "errorrrr";
}
require_once("");



?>