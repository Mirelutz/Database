<?php
require_once 'connection.php';

// Eliminăm și recreăm procedura dacă există
$sql1 = "DROP PROCEDURE IF EXISTS GetAdepti";
$stmt1 = $con->prepare($sql1);
$stmt1->execute();

$sql2 = "CREATE PROCEDURE GetAdepti()
BEGIN
    SELECT * FROM infadepti;
END";
$stmt2 = $con->prepare($sql2);
$stmt2->execute();

// Gestionarea ștergerii adepților
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $id = $_POST['delete_id'];

    // Obține calea imaginii din baza de date
    $sql = 'SELECT imagine FROM infadepti WHERE id = :id';
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $imagine = $stmt->fetchColumn();

    // Șterge înregistrarea din baza de date
    $sql = 'DELETE FROM infadepti WHERE id = :id';
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    // Șterge imaginea de pe server
    if ($imagine && file_exists($imagine)) {
        unlink($imagine);
    }

    echo "Adept șters cu succes!";
}

// Obține toate înregistrările din baza de date folosind procedura stocată
$sql = 'CALL GetAdepti()';
$q = $con->query($sql);
$q->setFetchMode(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de membri</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        img {
            width: 100px;
            height: auto;
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
    <h1>Lista de membri</h1>
    <table>
        <thead>
            <tr>
                <th>Nume</th>
                <th>Prenume</th>
                <th>Domiciliu</th>
                <th>IQ</th>
                <th>Imagine</th>
                <th>Acțiuni</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($q as $res): ?>
                <tr>
                    <td><?php echo htmlspecialchars($res['nume']); ?></td>
                    <td><?php echo htmlspecialchars($res['prenume']); ?></td>
                    <td><?php echo htmlspecialchars($res['domiciliu']); ?></td>
                    <td><?php echo htmlspecialchars($res['iq']); ?></td>
                    <td>
                        <?php if ($res['imagine']): ?>
                            <img src="data:image/jpeg;base64,<?php echo base64_encode($res['imagine']); ?>" alt="Imagine">
                        <?php else: ?>
                            <span>Nicio imagine</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <form action="lista.php" method="post" style="display:inline;">
                            <input type="hidden" name="delete_id" value="<?php echo $res['id']; ?>">
                            <input type="submit" value="Șterge">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="button-container">
        <a href="index.php">Inapoi la adeziune</a>
    </div>
</body>
</html>
