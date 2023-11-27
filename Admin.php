<?php
$servername = "172.232.217.28";
$username = "root";
$password = "SweetDreams123";
$DB = "sweetdreams";

$conn = mysqli_connect($servername,$username,$password,$DB);

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}

class Admin 
{
public $ID;
public $Username;
public $Phone;
public $Email;
public $Password;
public $Gender;

function __construct($ID)	{
    if ($ID !=""){
        $sql="select * from admins where 	ID=$ID";
        $Admin = mysqli_query($GLOBALS['conn'],$sql);
        if ($row = mysqli_fetch_array($Admin)){
            $this->Username=$row["Username"];
             $this->Phone=$row["Phone"];
            $this->Email=$row["Email"];
            $this->Password=$row["Password"];
            $this->Gender=$row["Gender"];
            $this->ID=$row["ID"];
         
        }
    }
}

static function adminLogin($Email, $Password) 
    {
      $sql = "SELECT * FROM admins WHERE Email='$Email'";
      $result = mysqli_query($GLOBALS['conn'], $sql);
      if ($row = mysqli_fetch_array($result)) {
        $storedPassword = $row['Password'];
        if (password_verify($Password, $storedPassword)) {
          return new Admin($row['ID']); 
        } else {
          echo "Email or password is incorrect";
        }
      } else {
        echo "Email or password is incorrect";
      }
    }


static function addAdmin($Username,$Phone,$Email,$Password,$Gender)
{
    // global $conn;
    // $sql = "SELECT * FROM admins WHERE Email = '$Email'";
    // $result = mysqli_query($conn, $sql);
    // if (mysqli_num_rows($result) > 0) {
    //     return "Email is already taken.";
    // }

        // $hashedPassword = password_hash($Password, PASSWORD_DEFAULT);

        
        $sql = "INSERT INTO admins (Username, Phone, Email, Password, Gender) VALUES ('$Username', '$Phone', '$Email', '$Password', '$Gender')";
        if(mysqli_query($GLOBALS['conn'],$sql))
        return true;
        else
        return false;
 
}
public static function displayAdminInfo($admin) {
  
  echo "<div class='input-box'>
            <label for='name'>Name: &nbsp;</label>
            " . $admin->Username . "
          </div>";

  echo "<div class='input-box'>
            <label for='number'>Phone Number: &nbsp;</label>
            " . $admin->Phone . "
          </div>";

  echo "<div class='input-box'>
            <label for='email'>Email: &nbsp;</label>
            " . $admin->Email . "
          </div>";

  echo "<div class='input-box'>
            <label for='gender'>Gender: &nbsp;</label>
            " . $admin->Gender . "
          </div>";
}


}










?>