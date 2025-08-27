<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 

require_once 'classe/Soma.php';
require_once 'classe/Subtracao.php';
require_once 'classe/Multiplicacao.php';
require_once 'classe/Divisao.php';

$valor1 = 20;
$valor2 = 2;


$operacoes = [
    'Soma' => new Soma(),
    'Subtração' => new Subtracao(),
    'Multiplicação' => new Multiplicacao(),
    'Divisão' => new Divisao()
];


foreach ($operacoes as $nome => $operacao) {
    try {
        $resultado = $operacao->calcular($valor1, $valor2);
        echo "$nome de $valor1 e $valor2 é: $resultado" . PHP_EOL;
    } catch (Exception $e) {
        echo "Erro ao realizar $nome: " . $e->getMessage() ;
    }

};

$resultado = $operacao->calcular(20, 2);
var_dump($resultado);

?>