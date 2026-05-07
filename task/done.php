<?php
require_once __DIR__ . '/../resources/views/components/header.php';
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
    <h1>Uitgevoerde Taken</h1>
       
   

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
</div>
</body>

</html>