<?php

require_once __DIR__ . '/../database/Database.php';

try {
    if (empty($_GET['alunoId'])) {
        throw new \Exception('ID do aluno é obrigatório para a edição.');
    }

    $conn = (new Database())->getConnection();
    $stmt = $conn->prepare('SELECT id, nome FROM alunos WHERE id = :alunoId');
    $stmt->bindValue(':alunoId', $_GET['alunoId'], PDO::PARAM_INT);
    $stmt->execute();
    $aluno = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (\Throwable $throwable) {
    // Redireciona para index.php após inserir
    header('Location: /aula8/view/index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h4>Editar Aluno</h4>
    <form action="/aula8/action/edita-aluno.php" method="post">
        <input type="text" name="id" readonly value="<?= ($aluno['id']); ?>">
        <input type="text" name="novoNome" value="<?= ($aluno['nome']); ?>">
        <button type="submit">Salvar</button>
    </form>
</body>
</html>
