<?php
$pdo = new PDO("mysql:host=db;dbname=app_db", "user", "secret");
$id = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
$stmt->execute([$id]);
header("Location: index.php");
exit;
