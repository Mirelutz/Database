<?php
try {
    require_once "connection.php";

    $query = new MongoDB\Driver\Query([]);

    $rows = $client->executeQuery("adepti.infadepti", $query);

    echo "<table border='1'>";
    echo "<tr><th>Nume</th><th>Prenume</th><th>Imagine</th></tr>";

    foreach ($rows as $doc) {
 
        if (isset($doc->image) && $doc->image != 'null') {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($doc->nume) . "</td>";
            echo "<td>" . htmlspecialchars($doc->prenume) . "</td>";

            echo "<td><img src='data:image;base64," . $doc->image . "' alt='Image' width='100' height='100'></td>";
            echo "</tr>";
        }
    }

    echo "</table>";
} catch (MongoDB\Driver\Exception\Exception $e) {
    echo "Eroare: " . $e->getMessage() . "\n";
}
?>
