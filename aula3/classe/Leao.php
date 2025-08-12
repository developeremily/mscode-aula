<?php

require_once 'AnimalInterface.php';
require_once 'FormaDeAndarAbstract.php';

class Leao extends FormaDeAndarAbstract implements AnimalInterface
{

    public function isAnimalRational(): bool
    {
        return false;
    }

    public function emitirSom(): void
    {
        echo "O leão ruge!";
    }

    public function tipo(): string
    {
        return "felino";
    }

    public function andar(): string
    {
        return "Andando com quatro patas.";
    }

    public function andaComQuantasPernas(): int
    {
        return 4;
    }
}
