<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/Database.php';

$conn = (new Database())->getConnection();

try {
    $conn->beginTransaction();
    $sql = 'DELETE FROM alunos WHERE id = :alunoId';

    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':alunoId', $_GET['alunoId'], PDO::PARAM_INT);
    $stmt->execute();

    $conn->commit();
} catch (\Throwable $throwable) {
    $conn->rollBack();

    echo 'Ocorreu um erro ao excluir o aluno.'
        . PHP_EOL .
        'Erro: '. $throwable->getMessage();
    exit;
}

// Redireciona para index.php após inserir
header('Location: /aula8/index.php');
exit;

