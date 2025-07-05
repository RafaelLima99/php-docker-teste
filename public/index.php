<?php
// Conexão com o banco
$pdo = new PDO("mysql:host=db;dbname=app_db", "user", "secret");
$users = $pdo->query("SELECT * FROM users")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Lista de Usuários</title>
</head>
<body>
    <h1>Usuários</h1>
    <a href="create.php">Criar novo usuário</a>
    <table border="1" cellpadding="10">
        <tr><th>ID</th><th>Nome</th><th>Email</th><th>Ações</th></tr>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?= $user['id'] ?></td>
            <td><?= $user['nome'] ?></td>
            <td><?= $user['email'] ?></td>
            <td>
                <a href="edit.php?id=<?= $user['id'] ?>">Editar</a> | 
                <a href="delete.php?id=<?= $user['id'] ?>">Excluir</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
