<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("location: ../login.php");
}
$userID = $_SESSION['user_id'];
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
    <h1>Mijn taken</h1>
    <a href="index.php">Terug naar homepagina &gt;</a>

    <?php
    $query = "SELECT titel, beschrijving, afdeling, deadline, status FROM taken WHERE user = $userID";
    $statement = $conn->prepare($query);
    $statement->execute();

    $kaarten = $statement->fetchAll(PDO::FETCH_ASSOC);
    ?>



    <table>
        <tr>
            <th>titel</th>
            <th>beschrijving</th>
            <th>afdeling</th>
            <th>Deadline</th>
        </tr>

        <?php foreach ($kaarten as $kaart): ?>
            <tr>
                <td><?php echo $kaart['titel']; ?></td>
                <td><?php echo $kaart['beschrijving']; ?></td>
                <td><?php echo $kaart['afdeling']; ?></td>
                <td><?php echo $kaart['deadline']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>

</html>