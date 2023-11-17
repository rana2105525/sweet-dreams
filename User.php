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

    static function login($email,$password){
		$sql="SELECT * FROM reg WHERE email='$email' and password='$password'";	
		$result=mysqli_query($GLOBALS['conn'],$sql);
		if ($row=mysqli_fetch_array($result)){
			return new User($row[0]); 		
		}
		return NULL;
	}

    // public function deleteUser() {
    //     $sql = "DELETE FROM reg WHERE id=$this->id";
    //     if (mysqli_query($GLOBALS['conn'], $sql)) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

    // static function logout($id) {
    //     session_start();
    //     session_destroy();
    //     header("Location:index.php");
    // }
}



?>