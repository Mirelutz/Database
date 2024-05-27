<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toate Imaginile Adeptilor</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        img {
            width: 100px;
            height: auto;
        }
    </style>
</head>
<body>
    <h1>Lista Imagini Adepti</h1>
    <table>
        <tr>
            <th>Nume</th>
            <th>Prenume</th>
            <th>Imagine</th>
        </tr>
        <?php
            $xml = simplexml_load_file('data.xml') or die('Eroare la încărcarea fișierului XML.');

            foreach ($xml->infadepti->adept as $adept) {
                echo '<tr>';
                echo '<td>' . $adept->nume . '</td>';
                echo '<td>' . $adept->prenume . '</td>';
                echo '<td>';
                if ($adept->image != 'null') {
                    echo '<img src="data:image/jpeg;base64,' . $adept->image . '" alt="Imagine utilizator" />';
                } else {
                    echo 'Nu există nicio imagine încărcată pentru acest utilizator.';
                }
                echo '</td>';
                echo '</tr>';
            }
        ?>
    </table>
</body>
</html>
