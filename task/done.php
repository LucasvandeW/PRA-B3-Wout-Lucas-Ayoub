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
    <title>Developerland takenlijst</title>
    <?php require_once __DIR__ . '/../head.php'; ?>
</head>

<body>
    <h1>Uitgevoerde Taken</h1>
        <img src="../img/logo-big-fill-only.png" alt="Developerland logo" class="logo">
    <button><a href="index.php">Terug naar homepagina &gt;</a></button>

    <?php
    $query = "SELECT titel, afdeling, status, deadline FROM taken WHERE status = 'done' ORDER BY deadline DESC";
    $statement = $conn->prepare($query);
    $statement->execute();

    $kaarten = $statement->fetchAll(PDO::FETCH_ASSOC);
    ?>



    <table>
        <tr>
            <th>titel</th>
            <th>afdeling</th>
            <th>Deadline</th>
        </tr>

        <?php foreach ($kaarten as $kaart): ?>
            <tr>
                <td><?php echo $kaart['titel']; ?></td>
                <td><?php echo $kaart['afdeling']; ?></td>
                <td><?php echo $kaart['deadline']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>

</html>