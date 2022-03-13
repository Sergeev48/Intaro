<?php

require_once "balanceCalc.php";

// получение массива с файлами тестов
$data = glob('A/*.dat');
// получение массива с файлами ответов на тесты
$ans = glob('A/*.ans');

echo "Тесты: <br>";

for ($i = 0; $i < 8; $i++) {
    $tests = fopen($ans[$i], 'r');

    $result = balanceСalculation($data[$i]);

    $answer = fgets($tests);

    echo ($i + 1) . ': ';

    if ($answer == $result) {
        echo 'ОК<br>';
    } else {
        echo 'Ошибка в тесте № ' . ($i + 1) . '<br>';
    }
}
