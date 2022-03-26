<?php

require_once "ipCalc.php";

// получение массива с файлами тестов
$data = glob('B/*.dat');
// получение массива с файлами ответов на тесты
$ans = glob('B/*.ans');

echo "Тесты: <br>";

for ($i = 0; $i < 8; $i++) {
    // получение результатов вычислений
    $result = ipСalculation($data[$i]);
    // получение ответов
    $answer = file_get_contents($ans[$i], 'r');
    // убираем переносы строк для сравнения
    $answer = str_replace(array("\r", "\n"), "", $answer);


    echo ($i + 1) . ': ';

    if ($answer == $result) {
        echo 'ОК<br>';
    } else {
        echo 'Ошибка в тесте № ' . ($i + 1) . '<br>';
    }
}
