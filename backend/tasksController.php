<?php

//Variabelen vullen
$action = $_POST['action'];
$id = $_POST['id'];
$titel = $_POST['titel'];
$beschrijving = $_POST['beschrijving'];
$afdeling = $_POST['afdeling'];
$status = $_POST['status'];
$deadline = $_POST['deadline'];

// $error = Array();

echo "gelukt deze informatie is verstuurd : " . $titel . " / " . $beschrijving . " / " . $afdeling . "/" . $deadline;

//1. Verbinding
require_once 'conn.php';

if ($action == "create") {
    $query = "INSERT INTO taken (titel, beschrijving, afdeling, deadline) 
 VALUES(:titel, :beschrijving, :afdeling, :deadline )";

    $data = [
        ":titel" => $titel,
        ":beschrijving" => $beschrijving,
        ":afdeling" => $afdeling,
        ":deadline" => $deadline
    ];
}

if ($action == "update") {
    $query = "UPDATE taken SET 
              titel = :titel,
              beschrijving = :beschrijving,
              afdeling = :afdeling,
              status = :status,
              deadline = :deadline

          WHERE id = :id";

    $data = [
        ":titel" => $titel,
        ":beschrijving" => $beschrijving,
        ":afdeling" => $afdeling,
        ":status" => $status,
        ":deadline" => $deadline

    ];

}

if ($action == "delete") {
    $query = "DELETE FROM taken WHERE id = :id";
}

//3. Prepare
$statement = $conn->prepare($query);

//4. Execute

if ($action == "update" || $action == "delete") {
    $data[":id"] = $id;
}

$statement->execute($data);

$items = $statement->fetchAll(PDO::FETCH_ASSOC);
header("Location: ../task/index.php?msg=Melding opgeslagen");





