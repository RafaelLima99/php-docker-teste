<?php
$pdo = new PDO("mysql:host=db;dbname=app_db", "user", "secret");
$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$stmt = $pdo->prepare("UPDATE users SET nome = ?, email = ? WHERE id = ?");
$stmt->execute([$nome, $email, $id]);
header("Location: index.php");
exit;
