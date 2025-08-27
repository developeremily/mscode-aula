<?php

require_once 'classe/OperacaoInterface.php';

class Soma implements OperacaoInterface  {
 
    public function calcular(float $valor1, float $valor2) 
    {
        return $valor1 + $valor2;
    }
}


?>