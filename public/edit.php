<?php
$pdo = new PDO("mysql:host=db;dbname=app_db", "user", "secret");
$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head><title>Editar Usuário</title></head>
<body>
    <h1>Editar Usuário</h1>
    <form action="update.php" method="POST">
        <input type="hidden" name="id" value="<?= $user['id'] ?>">
        Nome: <input type="text" name="nome" value="<?= $user['nome'] ?>"><br><br>
        Email: <input type="email" name="email" value="<?= $user['email'] ?>"><br><br>
        <input type="submit" value="Atualizar">
    </form>
</body>
</html>
