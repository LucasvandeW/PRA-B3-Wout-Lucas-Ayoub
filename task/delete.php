<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("location: ../login.php");
}


?>
<!doctype html>
<html lang="nl">

<head>
    <title>StoringApp / Meldingen / Aanpassen</title>
    <?php require_once '../head.php'; ?>
</head>

<body>
    <?php

    if (!isset($_GET['id'])) {
        echo "Geef in je aanpaslink op de index.php het id van betreffende item mee achter de URL in je a-element om deze pagina werkend te krijgen na invoer van je vijfstappenplan";
        exit;

    }
    ?>
    <?php
    // require_once '../header.php'; ?>

    <div class="container">
        <h1>Verwijderen</h1>

        <?php
        //Haal het id uit de URL:
        $id = $_GET['id'];




        //1. Haal de verbinding erbij TITEL BESCHRIJVING AFDELING STATUS
        require_once '../backend/conn.php';

        //2. Query, vul deze aan met een WHERE zodat je alleen de melding met dit id ophaalt
        $query = "SELECT * FROM taken WHERE id = :id";

        //3. Van query naar statement
        $statement = $conn->prepare($query);

        //4. Voer de query uit, voeg hier nog de placeholder toe
        $statement->execute([
            ":id" => $id
        ]);

        $melding = $statement->fetch(PDO::FETCH_ASSOC);
        //5. Ophalen gegevens, tip: gebruik hier fetch().
        
        ?>


        <form action="../backend/tasksController.php" method="post">
            <input type="hidden" name="action" value="delete">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" value="Verwijderen">
        </form>

    </div>

</body>

</html>