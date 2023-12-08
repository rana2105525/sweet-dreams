<?php
// database connection
$host = '172.232.217.28';
$db   = 'sweetdreams';
$user = 'root';
$pass = 'SweetDreams123';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);



    $search_string = $_POST['search_string'];
    $sql = "SELECT id, title  FROM products WHERE title LIKE :search_string";
    $stmt = $pdo->prepare($sql);

    $stmt->execute(['search_string' => "%$search_string%"]);

    while ($row = $stmt->fetch()) {
        echo '<button onclick="location.href=\'prod.php?id=' . $row['id'] . '\'">' . $row['title'] . '</button>';
    }

?>