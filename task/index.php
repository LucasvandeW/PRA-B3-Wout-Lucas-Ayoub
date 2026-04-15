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
        
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>

    <h1>Taaklijst</h1>
    <button><a href="../index.php">Terug naar home &gt;</a></button>
    <button><a href="create.php">Taak aanmaken &gt;</a></button>
    <button><a href="done.php">Uitgevoerde taken &gt;</a></button>
    <button><a href="mytasks.php">Bekijk mijn taken &gt;</a></button>
      <button><a href="categories.php">Bekijk taken per afdeling &gt;</a></button>

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
            <th>verwijderen</th>
        </tr>

        <?php foreach ($kaarten as $kaart): ?>
            <tr>
                <td><?php echo $kaart['titel']; ?></td>
                <td><?php echo $kaart['afdeling']; ?></td>
                <td><?php echo $kaart['status']; ?></td>
                <td><?php echo $kaart['deadline']; ?></td>


                <td><a href="edit.php?id=<?php echo $kaart['id']; ?>"> <button><i class="fa-solid fa-pen"></i></button></a>
                </td>
                <td><a href="delete.php?id=<?php echo $kaart['id']; ?>"> <button><i
                                class="fa-solid fa-trash"></i></button></a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>