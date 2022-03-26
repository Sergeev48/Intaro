<?php
function ipСalculation(string $fileName): string
{
    // чтение из файла
    $file = fopen($fileName, 'r');
    // считаем количество строк в файле
    $file_arr = file($fileName);
    $lines = count($file_arr);
    $result = "";
    for ($j = 0; $j < $lines; $j++) {
        // считываем в массив данные каждого блока
        $arr = explode(":", fgets($file));
        for ($i = 0; $i < count($arr); $i++) {
            // убираем пробелы
            $arr[$i] = trim($arr[$i]);
            // если встречается ::, элемент массива- пустой, заполняем его и недостающие блоки нулями
            if ($arr[$i] == "") {
                while (count($arr) < 8) {
                    $key = $i;
                    array_splice($arr, $key, 0, '0000');
                }
            }
        }
        // если блоков < 8 дополняем массив нулями 
        while (count($arr) < 8) {
            array_push($arr, "0000");
        }
        // если длина блока < 4, то дополняем слева нулями
        for ($i = 0; $i < 8; $i++) {
            if (strlen($arr[$i]) < 4) {
                $arr[$i] = str_pad($arr[$i], 4, "0", STR_PAD_LEFT);
            }
        }
        // записываем все результаты
        $result .= implode(':', $arr);
    }
    return $result;
}
