<?php
require_once 'connection.php';

// Eliminăm procedura dacă există
$sql1 = "DROP PROCEDURE IF EXISTS AdAdept";
$stmt1 = $con->prepare($sql1);
$stmt1->execute();

// Cream procedura stocată pentru a adăuga un nou adept
$sql2 = "CREATE PROCEDURE AdAdept(IN p_nume VARCHAR(255), IN p_prenume VARCHAR(255), IN p_domiciliu VARCHAR(255), IN p_iq INT)
BEGIN
    INSERT INTO infadepti (nume, prenume, domiciliu, iq) VALUES (p_nume, p_prenume, p_domiciliu, p_iq);
END";
$stmt2 = $con->prepare($sql2);
$stmt2->execute();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nume = $_POST['nume'];
    $prenume = $_POST['prenume'];
    $domiciliu = $_POST['domiciliu'];
    $iq = $_POST['iq'];

    // Apelăm procedura stocată pentru a adăuga un nou adept
    $sql = 'CALL AdAdept(:nume, :prenume, :domiciliu, :iq)';
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':nume', $nume);
    $stmt->bindParam(':prenume', $prenume);
    $stmt->bindParam(':domiciliu', $domiciliu);
    $stmt->bindParam(':iq', $iq);
    $stmt->execute();

    echo "Adept adăugat cu succes!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adaugă un nou adept</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }
        .form-container {
            text-align: center;
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #dddddd;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #dddddd;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .button-container a {
            text-decoration: none;
            color: white;
            background-color: #007bff;
            padding: 10px 20px;
            border-radius: 5px;
            display: inline-block;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Adaugă un nou adept</h1>
        <form action="adaugare.php" method="post">
            <input type="text" name="nume" placeholder="Nume" required>
            <input type="text" name="prenume" placeholder="Prenume" required>
            <input type="text" name="domiciliu" placeholder="Domiciliu" required>
            <input type="number" name="iq" placeholder="IQ" required>
            <input type="submit" value="Adaugă">
        </form>
        <div class="button-container">
            <a href="index.php">Inapoi la adeziune</a>
        </div>
    </div>
</body>
</html>
