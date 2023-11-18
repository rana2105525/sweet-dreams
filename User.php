<?php
$servername = "172.232.217.28";
$username = "root";
$password = "SweetDreams123";
$DB = "sweetdreams";

$conn = mysqli_connect($servername,$username,$password,$DB);

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}


class User
{
    public $id;
    public $name;
    public $email;
    public $password;
    public $birth;
    public $gender; 

    function __construct($id)	{
		if ($id !=""){
			$sql="select * from reg where 	id=$id";
			$User = mysqli_query($GLOBALS['conn'],$sql);
			if ($row = mysqli_fetch_array($User)){
				$this->name=$row["name"];
				$this->email=$row["email"];
                $this->password=$row["password"];
                $this->birth=$row["birth"];
                $this->gender=$row["gender"];
				$this->id=$row["id"];
				// $this->UserType_obj=new UserType($row["UserType_id"]);
			}
		}
	}

    static function InsertinDB_Static($name,$email,$password,$birth,$gender)	{
		$sql="insert into reg(name,email,password,birth,gender) values ('$name','$email','$password','$birth','$gender')";
		if(mysqli_query($GLOBALS['conn'],$sql))
			return true;
		else
			return false;
	}

  static function login($email, $password)
{
  $sql = "SELECT * FROM reg WHERE email='$email'";
  $result = mysqli_query($GLOBALS['conn'], $sql);
  if ($row = mysqli_fetch_array($result)) {
    $storedPassword = $row['password'];
    if (password_verify($password, $storedPassword)) {
      return new User($row['id']); 
    } else {
      echo "Email or password is incorrect";
    }
  } else {
    echo "Email or password is incorrect";
  }
}
  

   public function deleteUser() {
        $sql = "DELETE FROM reg WHERE id=$this->id";
        $result = mysqli_query($GLOBALS['conn'], $sql);

        // Check if the deletion was successful.
        if ($result) {
            // Destroy the session.
            session_destroy();
        
            // Display a success message.
            header("Location:index.php");
        } else {
            // Display an error message.
            echo 'Error deleting user.';
        }
     }
     public function editUser($name, $email){
      $sql = "UPDATE reg SET name='$name', email='$email' WHERE id=$this->id";
      $result = mysqli_query($GLOBALS['conn'], $sql);
  
      // Check if the update was successful.
      if ($result) {
          // Update the session variables.
          $_SESSION['name'] = $name;
          $_SESSION['email'] = $email;
  
          // Redirect the user to the index page.
          header('Location: index.php');
          exit();
      } else {
          // Display an error message.
          echo 'Error updating user profile.';
      }
  }
  
     

     public function logout() {
         session_start();
         session_destroy();
         header("Location:index.php");
     }
}



?>