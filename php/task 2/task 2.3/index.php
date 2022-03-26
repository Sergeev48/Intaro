<?php
echo preg_replace_callback("#'(\d+)'#", 'multiplication', "2aaa'3'bbb'4'");
function multiplication($matches)
{
    $result = $matches[1] * 2; //$matches[1] - это найденное число
    return "'$result'";
}
