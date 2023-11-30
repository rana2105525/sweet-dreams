<?php
include '../../../dbh.php';
class Review extends Dbh{
    private static $id;
    private static $fullname;
    private static $review;
    public function __construct($id){
		if ($id !=""){
			$sql="select * from products where 	id=$id";
			$result = mysqli_query(self::connect(),$sql);
			if ($row = mysqli_fetch_assoc($result)){
				self::$id=$row["id"];
				self::$fullname=$row["fullname"];
				self::$review=$row["review"];
            }
		}
	}

    public static function getReviews(){
    $sql = "SELECT * FROM reviews";
    $result = mysqli_query(self::connect(),$sql);
     //fetch all data inside the database
    while($row = mysqli_fetch_assoc($result)){
      self::$id = $row["id"];
      self::$fullname = $row["fullname"];
      self::$review = $row["review"];
      echo '<tr>
              <td>'.self::$fullname.'</td>
              <td>'.self::$review.'</td>
              <td>
                <form action="" method="post">
                  <button><a href="deleteReview.php?delete_id='.self::$id.'">Delete</button>
                </form>
              </td>
            </tr>';
        }

    }
}   