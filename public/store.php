<?php
$pdo = new PDO("mysql:host=db;dbname=app_db", "user", "secret");
$nome = $_POST['nome'];
$email = $_POST['email'];
$stmt = $pdo->prepare("INSERT INTO users (nome, email) VALUES (?, ?)");
$stmt->execute([$nome, $email]);
header("Location: index.php");
exit;
