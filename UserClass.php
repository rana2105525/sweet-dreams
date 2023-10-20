<?php
//include "DB.php";
$con = mysqli_connect("172.232.217.28", "root", "SweetDreams123", "sweetdreams");

class User
{
    public $UserName;
    public $Password;
    public $UserType_obj;
    public $ID;

    function __construct($id)
    {
        if ($id != "") {
            $sql = "select * from registrations where 	id=$id";
            $User = mysqli_query($GLOBALS['con'], $sql);
            if ($row = mysqli_fetch_array($User)) {
                $this->UserName = $row["fullname"];
                $this->Password = $row["password"];
                $this->ID = $row["id"];
                $this->UserType_obj = new UserType($row["type"]);
            }
        }
    }

    static function login($UserName, $Password)
    {
        $sql = "SELECT * FROM registrations WHERE fullname='$UserName' and password='$Password'";
        $result = mysqli_query($GLOBALS['con'], $sql);
        if ($row = mysqli_fetch_array($result)) {
            return new User($row[0]);
        }
        return NULL;
    }

    static function SelectAllUsersInDB()
    {
        $sql = "select * from registrations";
        $Users = mysqli_query($GLOBALS['con'], $sql);
        $i = 0;
        $Result=array();
        while ($row = mysqli_fetch_array($Users)) {
            $MyObj = new User($row["id"]);
            $Result[$i] = $MyObj;
            $i++;
        }
        return $Result;
    }

    static function deleteUser($ObjUser)
    {
        $sql = "delete from registrations where id=" . $ObjUser->id;
        if (mysqli_query($GLOBALS['con'], $sql))
            return true;
        else
            return false;
    }

    static function InsertinDB_Static($UN,$email, $PW,$birth,$gender)
    {
        $sql = "insert into registrations(fullname,email,password,birth,gender,type) values ('$UN','$email',$PW','$birth,'$gender',2)";
        if (mysqli_query($GLOBALS['con'], $sql))
            return true;
        else
            return false;
    }

    function UpdateMyDB()
    {
        $sql = "update registrations set fullname='" . $this->UserName . "' ,password='$this->Password' where id=" . $this->ID . "";
        if (mysqli_query($GLOBALS['con'], $sql))
            return true;
        else
            return false;
    }
}


?>