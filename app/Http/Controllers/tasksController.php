<?php 
$action = $_POST['action'];

if ($_POST[$action] == "create") {
    require_once __DIR__ . '/../backend/conn.php';

    $query = "INSERT INTO taken (titel, beschrijving, afdeling)

    VALUES (:titel, :beschrijving, :afdeling)";

    $statement = $conn->prepare($query);

    $statement->execute([
        ':titel' => $_POST['titel'],
        ':beschrijving' => $_POST['beschrijving'],
        ':afdeling' => $_POST['afdeling']
    ]);
}
header("Location: ../task/index.php?msg=Taak succesvol aangemaakt");