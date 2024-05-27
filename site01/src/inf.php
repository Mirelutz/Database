<?php
require_once 'connection.php';

$sql1 = "DROP PROCEDURE IF EXISTS NrPersSiMediaIq";
$stmt1 = $con->prepare($sql1);
$stmt1->execute();

$sql2 = "CREATE PROCEDURE NrPersSiMediaIq()
BEGIN
    SELECT COUNT(*) AS nrpers, AVG(iq) AS mediaiq FROM infadepti;
END";
$stmt2 = $con->prepare($sql2);
$stmt2->execute();

$sql = 'CALL NrPersSiMediaIq()';
$q = $con->query($sql);
$q->setFetchMode(PDO::FETCH_ASSOC);
$result = $q->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistici</title>
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
        .stats {
            text-align: center;
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #dddddd;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .button-container {
            margin-top: 20px;
        }
        .button-container a {
            text-decoration: none;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="stats">
        <h1>Statistici</h1>
        <p>Număr de persoane: <?php echo $result['nrpers']; ?></p>
        <p>Media IQ-urilor: <?php echo number_format($result['mediaiq'], 2); ?></p>
        <div class="button-container">
            <a href="index.php">Înapoi la adeziune</a>
        </div>
    </div>
</body>
</html>
