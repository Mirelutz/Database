<?php
session_start();
require_once "connection.php";

$username = $_SESSION['user'];

$query = new MongoDB\Driver\Query(['nume' => $username]);
$rows = $client->executeQuery('adepti.infadepti', $query);

foreach ($rows as $doc) {
    if (isset($doc->image)) {
        $imageData = base64_decode($doc->image);
        $imageSrc = 'data:image/jpeg;base64,' . $doc->image;
        echo "<img src='$imageSrc' alt='Imagine utilizator' />";
    } else {
        echo "Nu există nicio imagine încărcată pentru acest utilizator.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Afișare Imagine</title>
</head>
<body>
    <!-- Conținut HTML -->
</body>
</html>
