<?php
require_once 'connection.php';

$sql1 = "DROP PROCEDURE IF EXISTS GetAdepti";
$stmt1 = $con->prepare($sql1);
$stmt1->execute();

$sql2 = "CREATE PROCEDURE GetAdepti()
BEGIN
    SELECT * FROM infadepti;
END";
$stmt2 = $con->prepare($sql2);
$stmt2->execute();

$sql = 'CALL GetAdepti()';
$q = $con->query($sql);
$q->setFetchMode(PDO::FETCH_ASSOC);
?>
<table>
<tr>
<th>Nume</th>
<th>Prenume</th>
<th>Domiciliu</th>
<th>IQ</th>
</tr>
<?php if (isset($q)): // Verifică dacă $q este definit ?>
    <?php while ($res = $q->fetch()): ?>
    <tr>
    <td><?php echo $res['nume']; ?></td>
    <td><?php echo $res['prenume']; ?></td>
    <td><?php echo $res['domiciliu']; ?></td>
    <td><?php echo $res['iq']; ?></td>
    </tr>
    <?php endwhile; ?>
<?php endif; ?>
</table>
<div class="button-container">
        <a href="index.php">Inapoi la adeziune</a>
</div>

