<?php

require_once 'AnimalInterface.php';
require_once 'FormaDeAndarAbstract.php';

class Gato extends FormaDeAndarAbstract implements AnimalInterface
{
    public function isAnimalRational(): bool
    {
        return false;
    }

    public function emitirSom(): void
    {
        echo "O gato mia!";
    }

    public function tipo(): string
    {
        return "felino";
    }

    public function andaComQuantasPernas(): int
    {
        return 4;
    }
}
