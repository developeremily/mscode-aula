<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/Database.php';

$conn = (new Database())->getConnection();
$stmt = $conn->query('SELECT * FROM alunos');
$alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ul>
        <?php
        foreach ($alunos as $aluno) {
            echo "<li>{$aluno['nome']}</li>";
        }
        ?>
    </ul>
</body>
</html>
