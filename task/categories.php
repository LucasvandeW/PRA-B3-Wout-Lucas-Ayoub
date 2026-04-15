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
    <title>categories</title>
    <?php require_once __DIR__ . '/../head.php'; ?>
</head>



<div class="container">
    <h1>categories</h1>
    <img src="../img/logo-big-fill-only.png" alt="Developerland logo" class="logo">
    <button><a href="index.php">Terug naar home &gt;</a></button>

    <form action="../backend/caterogiesController.php" method="post">

        <div class="form-group">
            <label for="afdeling">Kies een afdeling</label>
            <select name="afdeling" id="afdeling" class="form-input">
                <option value=""></option>
                <option value="personeel">personeel</option>
                <option value="horeca">horeca</option>
                <option value="techniek">techniek</option>
                <option value="inkoop">inkoop</option>
                <option value="klantenservice">klantenservice</option>
                <option value="groen">groen</option>






                <input type="submit" name="bekijk" id="bekijk" value="bekijk" class="btn btn-primary">
        </div>
    </form>





    <?php

    $taken = $_SESSION['gefilterd'] ?? [];
    ?>



    <?php if (empty($taken)): ?>
        <p>Er zijn geen taken gevonden voor deze afdeling.</p>
    <?php else: ?>

        <table>
            <tr>
                <th>Titel</th>
                <th>Beschrijving</th>
                <th>Status</th>
                <th>Deadline</th>
            </tr>

            <?php foreach ($taken as $t): ?>
                <tr>
                    <td><?= $t['titel'] ?></td>
                    <td><?= $t['beschrijving'] ?></td>
                    <td><?= $t['status'] ?></td>
                    <td><?= $t['deadline'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>



    <?php endif; ?>


</html>