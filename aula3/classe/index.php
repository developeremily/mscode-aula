<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'classe/Cachorro.php';
require_once 'classe/Gato.php';
require_once 'classe/Leao.php';
require_once 'classe/Humano.php';

$animais = [
    new Cachorro(),
    new Gato(),
    new Leao(),
    new Humano(),
];

// $tipos = [];

// foreach ($animais as $animal) {
//     if (!in_array($animal->tipo(), $tipos)) {
//         $tipos[] = $animal->tipo();
//     }
// }

// echo implode("<br>", $tipos);

foreach ($animais as $animal) {
    echo $animal->andar();
    echo "<br><br>";
}
