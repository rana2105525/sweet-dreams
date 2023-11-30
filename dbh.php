<?php 
class Dbh{
    private static $servername = "172.232.217.28";
    private static $username = "root";
    private static $pwd = "SweetDreams123";
    private static $dbName = "sweetdreams";
    private static $conn; 

    protected static function connect(){
        self::$conn = mysqli_connect(self::$servername,self::$username,self::$pwd,self::$dbName);
        if (!self::$conn)
            die ("<h1>Database Connection Failed</h1>". mysqli_connect_error());
        return self::$conn;
    }

}
