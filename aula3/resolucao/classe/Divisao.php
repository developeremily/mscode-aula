<?php

require_once 'classe/OperacaoInterface.php';

class Divisao implements OperacaoInterface
{

    public function calcular(float $valor1, float $valor2)
    {
        if ($valor2 == 0) {
            throw new Exception("Erro: Não é possível dividir por zero.");
        }
        return $valor1 / $valor2;
    }
}
