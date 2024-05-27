<?php
require_once 'connection.php';

$sql1 = "DROP TRIGGER IF EXISTS BeforeInsertTrigger_Uppercase";
$stmt1 = $con->prepare($sql1);
$stmt1->execute();

$sql2 = "DROP TRIGGER IF EXISTS BeforeInsertTrigger_IQCheck";
$stmt2 = $con->prepare($sql2);
$stmt2->execute();

$sql3 = "DROP TRIGGER IF EXISTS BeforeInsertTrigger_LowercasePrenume";
$stmt3 = $con->prepare($sql3);
$stmt3->execute();

$sql4 = "CREATE TRIGGER BeforeInsertTrigger_Uppercase BEFORE INSERT ON infadepti FOR EACH ROW
BEGIN
    SET NEW.nume = UPPER(NEW.nume);
END;";
$stmt4 = $con->prepare($sql4);
$stmt4->execute();

$sql5 = "CREATE TRIGGER BeforeInsertTrigger_IQCheck BEFORE INSERT ON infadepti FOR EACH ROW
BEGIN
    IF NEW.iq % 13 = 0 THEN
        SET NEW.iq = 300;
    END IF;
END;";
$stmt5 = $con->prepare($sql5);
$stmt5->execute();

$sql6 = "CREATE TRIGGER BeforeInsertTrigger_LowercasePrenume BEFORE INSERT ON infadepti FOR EACH ROW
BEGIN
    SET NEW.prenume = LOWER(NEW.prenume);
END;";
$stmt6 = $con->prepare($sql6);
$stmt6->execute();

?>
