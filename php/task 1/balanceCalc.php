<?php
function balanceСalculation(string $fileName): int
{
    $file = fopen($fileName, 'r');
    $n = fgets($file); //количество ставок
    $betAmount = array(); //массив для ставок
    $expenses = 0; //расходы на ставки
    for ($i = 0; $i < $n; $i++) {
        list($a, $s, $r) = explode(" ", fgets($file)); // a — идентификатор игры, s — сумма ставки, ri — результат

        $r = trim($r);
        $betAmount[$a][$r] = $s;
        $expenses -= $s;
    }
    $m = fgets($file); // количество игр
    // прогонка по всем играм
    for ($i = 0; $i < $m; $i++) {
        list($a, $c, $d, $k, $r) = explode(" ", fgets($file)); // a — идентификатор игры, c — коэффициент на победу левой команды, d — правой команды, k — на ничью, r — результат
        $r = trim($r);
        if (isset($betAmount[$a][$r])) {
            $winning = $betAmount[$a][$r];
            if ($r == 'L') {
                $winning *= $c;
            }
            if ($r == 'R') {
                $winning *= $d;
            }
            if ($r == "D") {
                $winning *= $k;
            }
            $expenses += $winning;
        }
    }
    return $expenses;
}
