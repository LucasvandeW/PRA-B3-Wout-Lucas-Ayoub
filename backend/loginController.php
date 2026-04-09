<?php

session_start();

$username = $_POST['username'];
$password = $_POST['password'];

require_once 'conn.php';

$query = "SELECT * FROM users WHERE username = :username";

$statement = $conn->prepare($query);

$statement->execute([
    ":username" => $username
]);

$user = $statement->fetch(PDO::FETCH_ASSOC);

$_SESSION['user_id'] = $user['id'];

header("Location: ../task/index.php?msg=Welkom " . $username);