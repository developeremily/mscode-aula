<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/Database.php';

$conn = (new Database())->getConnection();
$stmt = $conn->query('SELECT id, nome FROM alunos ORDER BY nome');
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
    <form action="/aula8/criar-aluno.php" method="post">
        <input type="text" name="nome" placeholder="Nome do Aluno" required>
        <button type="submit">Adicionar</button>
    </form>

    <ul>
        <?php
        foreach ($alunos as $aluno) {
            echo sprintf(
                <<<'HTML'
                <span style="display: flex; justify-content: space-between;">
                    <li>%s</li>
                    <a href="/aula8/excluir-aluno.php?alunoId=%d">Excluir</a>
                </span>
                HTML,
                $aluno['nome'],
                $aluno['id']
            );
        }
        ?>
    </ul>
</body>
</html>
