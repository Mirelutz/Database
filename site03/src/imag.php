<?php
session_start();

if (!isset($_SESSION['user'])) {
    echo "Utilizatorul nu este autentificat.";
    exit();
}

$username = $_SESSION['user'];

$xml = simplexml_load_file('data.xml');

$userFound = false;
foreach ($xml->infadepti->adept as $adept) {
    if ((string)$adept->nume == $username) {
        if (!empty($adept->image)) {
            $imageSrc = 'data:image/jpeg;base64,' . (string)$adept->image;
            echo "<img src='$imageSrc' alt='Imagine utilizator' />";
        } else {
            echo "Nu există nicio imagine încărcată pentru acest utilizator.";
        }
        $userFound = true;
        break;
    }
}

if (!$userFound) {
    echo "Utilizatorul nu a fost găsit.";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Afișare Imagine</title>
</head>
<body>
</body>
</html>
