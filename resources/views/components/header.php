<?php 
session_start();

if (!isset($_SESSION['user_id'])) {
    header("location: ../login.php");
} ?>
<head>
    <link rel="stylesheet" href="../css/header.css">
</head>   


<header>
        <div class="logo">   <img src="../img/logo-big-v4.png" alt="Developerland Logo">  </div>



        <div class="nav-buttons">
           

         <a href="../task/index.php" class="btn">Terug naar home </a>
         <a href="create.php" class="btn">Taak aanmaken </a>
         <a href="done.php" class="btn">Uitgevoerde taken </a>
         <a href="mytasks.php" class="btn">Bekijk mijn taken </a>
         <a href="categories.php" class="btn">Bekijk taken per afdeling</a>
         <a href="../logout.php" class="btn">uitloggen</a>

        </div>
        
    </header>