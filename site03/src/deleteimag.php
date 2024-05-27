<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = isset($_SESSION['user']) ? $_SESSION['user'] : '';

    if ($username == '') {
        echo "Utilizatorul nu este autentificat.";
        exit();
    }

    $xml = simplexml_load_file('data.xml');

    $userFound = false;
    foreach ($xml->infadepti->adept as $adept) {
        if ((string)$adept->nume == $username) {
            $adept->image = 'null';
            $userFound = true;
            break;
        }
    }

    if ($userFound) {
        $xml->asXML('data.xml');
        echo "Imaginea a fost stearsa cu succes.";
    } else {
        echo "Utilizatorul nu a fost găsit.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Șterge imagine</title>
</head>
<body>
    <h2>Șterge imagine</h2>
    <form action="deleteimag.php" method="post">
        <button type="submit">Sterge imaginea</button>
    </form>
</body>
</html>
