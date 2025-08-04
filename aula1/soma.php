<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$erro = "";
$numero = null;

$valorMax = 17;

if (isset($_GET['numero'])) {
    $numeroSelec = intval($_GET['numero']);

    if ($numeroSelec < 1 || $numeroSelec > $valorMax) {
        $erro = "Selecione um número entre 1 e $valorMax.";
    } else {
        $numero = $numeroSelec;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabuada de Soma</title>
</head>
<body>

    <h1>Tabuada de Soma</h1>
    
    <form method="get" action="">
        <label for="numero">Escolha um número entre 1 e <?=$valorMax?>:</label>

        <select name="numero" id="numero">
            <?php
            for ($i = 1; $i <=$valorMax; $i++) {
                $selected = ($numero === $i) ? 'selected' : '';
                echo "<option value=\"$i\" $selected>$i</option>";
            }
            ?>
        </select>

        <button type="submit">Mostrar Tabuada do número  <?=$numero ?? '...'?></button>
    </form>

        <?php if ($erro): ?>
            <p style="color: red;"><?= htmlspecialchars($erro) ?></p>
        <?php endif; ?>

        <?php
        if ($numero !== null): ?>
        <h2>Tabuada de soma do número <?= $numero ?></h2>

    <ul>
        <?php
        for ($i = 1; $i <= $valorMax; $i++) {
            $resultado = $numero + $i ;

            echo "<li> $numero + $i = $resultado</li>";
        }
        ?>
    </ul>
    <?php endif; ?>
</body>
</html>