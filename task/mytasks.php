<?php
require_once __DIR__ . '/../resources/views/components/header.php';
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
    <div class="container">
    <h1>Mijn taken</h1>
   
    

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
</div>
</body>

</html>