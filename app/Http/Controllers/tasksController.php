<?php //status FROM taken WHERE user = $userID"
$action = $_POST['action'];

if ($_POST[$action] == "create") {
    require_once __DIR__ . '/../backend/conn.php';

    $query = "INSERT INTO taken (titel, beschrijving, afdeling, user)

    VALUES (:titel, :beschrijving, :afdeling, :user)";

    $statement = $conn->prepare($query);

    $statement->execute([
        ':titel' => $_POST['titel'],
        ':beschrijving' => $_POST['beschrijving'],
        ':afdeling' => $_POST['afdeling'],
        ':user' => $_POST['user']
    ]);
}
header("Location: ../task/index.php?msg=Taak succesvol aangemaakt");