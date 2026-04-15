<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("location: ../login.php");
}

require_once __DIR__ . '/../backend/conn.php';
require_once __DIR__ . '/../backend/config.php';
?>
<!doctype html>
<html lang="nl">

<head>
    <title>Taak aanmaken</title>
          
    <?php require_once __DIR__ . '/../head.php'; ?>
</head>

<div class="container">
    <h1>Taak aanmaken</h1>
    <form action="../backend/tasksController.php" method="post">
        <input type="hidden" name="action" value="create">
        <div class="form-group">
            <label for="titel">Taaknaam</label>
            <input type="text" name="titel" id="titel" class="form-input" required>
        </div>

        <div class="form-group">
            <label for="beschrijving">Beschrijving</label>
            <textarea name="beschrijving" id="beschrijving" class="form-input" rows="4"></textarea>
        </div>

        <div class="form-group">
            <label for="afdeling">afdeling</label>
            <select name="afdeling" id="afdeling" class="form-input">
                <option value="">--Selecteer een afdeling--</option>
                <option value="personeel">personeel</option>
                <option value="horeca">horeca</option>
                <option value="techniek">techniek</option>
                <option value="inkoop">inkoop</option>
                <option value="klantenservice">klantenservice</option>
                <option value="groen">groen</option>
        </div>

        <div class="form-group">
            <label for="deadline">Deadline</label>
            <input type="date" name="deadline" id="deadline" class="form-input">
        </div>

        <input type="hidden" name="action" value="create">
        <input type="hidden" name="id">

        <div class="form-group">
            <label for="verzend"></label>
            <input type="submit" name="verzend" id="verzend" value="verzend" class="btn btn-primary"> <button><a
                    href="index.php">Terug naar takenlijst &gt;</a></button>
        </div>
    </form>


</html>