<?php
session_start();
require_once "connection.php";

$username = $_SESSION['user'];

// Verificăm dacă utilizatorul are deja o imagine încărcată în baza de date
$filter = ['nume' => $username];
$options = [];
$query = new MongoDB\Driver\Query($filter, $options);
$result = $client->executeQuery('adepti.infadepti', $query);

foreach ($result as $doc) {
    $userImage = $doc->image;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_image'])) {
    // Ștergem imaginea din baza de date pentru utilizatorul logat
    $bulk = new MongoDB\Driver\BulkWrite;
    $bulk->update(
        ['nume' => $username],
        ['$unset' => ['image' => ""]],
        ['multi' => false, 'upsert' => false]
    );
    $client->executeBulkWrite('adepti.infadepti', $bulk);

    header("Location: imag.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imaginea incarcata de tine</title>
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Imaginea încărcată de tine</h1>
        <?php if (isset($userImage) && !empty($userImage)): ?>
            <img src="data:image/jpeg;base64,<?php echo $userImage; ?>" alt="Imaginea încărcată de tine" class="img-thumbnail mt-3 mb-3">
            <form method="post">
                <button type="submit" class="btn btn-danger" name="delete_image">Șterge imaginea</button>
            </form>
        <?php else: ?>
            <p>Nu ai încărcat încă nicio imagine.</p>
        <?php endif; ?>
    </div>
</body>
</html>
