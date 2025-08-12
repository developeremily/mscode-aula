<?php

interface AnimalInterface
{
    public function isAnimalRational(): bool;

    public function emitirSom(): void;

    public function tipo(): string;
}
