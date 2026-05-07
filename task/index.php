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
        
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
<div class="container">
    <h1>Takenlijst</h1>
   

    <?php if (isset($_GET['msg'])) {
        echo "<div class='msg'>" . $_GET['msg'] . "</div>";

    } ?>


    <?php
    $query = "SELECT titel, afdeling, status, deadline, id FROM taken WHERE status <> 'done' ORDER BY deadline DESC";
    $statement = $conn->prepare($query);
    $statement->execute();

    $kaarten = $statement->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <table>
        <tr>
            <th>titel</th>
            <th>afdeling</th>
            <th>status</th>
            <th>deadline</th>
            <th>aanpassen</th>
            
        </tr>

        <?php foreach ($kaarten as $kaart): ?>
            <tr>
                <td><?php echo $kaart['titel']; ?></td>
                <td><?php echo $kaart['afdeling']; ?></td>
                <td><?php echo $kaart['status']; ?></td>
                <td><?php echo $kaart['deadline']; ?></td>


                <td><a href="edit.php?id=<?php echo $kaart['id']; ?>"> <button><i class="fa-solid fa-pen"></i></button></a>
                 <a href="delete.php?id=<?php echo $kaart['id']; ?>"> <button><i
                                class="fa-solid fa-trash"></i></button></a></td>
          
            </tr>
        <?php endforeach; ?>
    </table>
    </div>
</body>

</html>