<?php
$host = 'mysql_db';
$db = 'adepti';
$user = 'root';
$pass = 'toor';
$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $con = new PDO($dsn, $user, $pass, $options);
    echo "Conexiune reușită!";
} catch (PDOException $e) {
    echo 'Eroare de conexiune: ' . $e->getMessage();
}
?>
