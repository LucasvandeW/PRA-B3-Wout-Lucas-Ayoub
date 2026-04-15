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
    <img src="../img/logo-big-fill-only.png" alt="Developerland logo" class="logo">
    <div class="container">
        <h1>aanpassen</h1>

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
            <input type="hidden" name="action" value="update">
            <input type="hidden" name="id" value="<?php echo $id; ?>">


            <div class="form-group">
                <label for="titel">Titel</label>
                <input type="text" name="titel" id="titel" class="form-input"
                    value="<?php echo ($melding['titel']); ?>">
            </div>


            <div class="form-group">
                <label for="beschrijving">Beschrijving</label>
                <textarea name="beschrijving" id="beschrijving" class="form-input" rows="4"><?php
                echo ($melding['beschrijving']);
                ?></textarea>
            </div>


            <div class="form-group">
                <label for="afdeling">Afdeling</label>
                <select name="afdeling" id="afdeling" class="form-input">
                    <option value="">--Selecteer een afdeling--</option>

                    <?php
                    $afdelingen = ["personeel", "horeca", "techniek", "inkoop", "klantenservice", "groen"];
                    foreach ($afdelingen as $afd) {
                        $selected = ($melding['afdeling'] === $afd) ? "selected" : "";
                        echo "<option value='$afd' $selected>$afd</option>";
                    }
                    ?>
                </select>
            </div>


            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-input">
                    <?php
                    $statussen = ["todo", "doing", "done"];
                    foreach ($statussen as $s) {
                        $selected = ($melding['status'] === $s) ? "selected" : "";
                        echo "<option value='$s' $selected>$s</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="deadline">Deadline</label>
                <input type="date" name="deadline" id="deadline" class="form-input"
                    value="<?php echo ($melding['deadline']); ?>">
                <input type="submit" value="Opslaan">
        </form>

    </div>

</body>

</html>