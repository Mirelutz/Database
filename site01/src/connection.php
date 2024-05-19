<?php
$host = 'mysql_db'; #localhost
$db = 'adepti';
$user = 'root';
$pass = 'toor';
$dsn = "mysql:host=$host;dbname=$db";

try {
    $con = new PDO($dsn, $user, $pass);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    exit;
}
?>