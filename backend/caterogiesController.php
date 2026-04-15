<?php
require_once __DIR__ . '/conn.php';

if (isset($_POST['bekijk'])) {

    $afdeling = $_POST['afdeling'];

    $query = $conn->prepare("
        SELECT titel, beschrijving, status, deadline, afdeling
        FROM taken
        WHERE afdeling = :afdeling
    ");

    $query->execute(['afdeling' => $afdeling]);

    $taken = $query->fetchAll(PDO::FETCH_ASSOC);

   
    session_start();
    $_SESSION['gefilterd'] = $taken;

    header("Location: ../task/categories.php");
    exit;
}
