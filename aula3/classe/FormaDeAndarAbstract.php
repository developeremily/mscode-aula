<?php

abstract class FormaDeAndarAbstract
{
    public function andar(): string
    {
        return "Andando de forma genérica.";
    }

    abstract public function andaComQuantasPernas(): int;
}
