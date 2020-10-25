<?php
function powerNum(int $number, int $pow): int
{
    if ($pow === 0) {
        return 1;
    }
    if ($pow % 2 === 0) {
        $pNumber = powerNum($number, $pow/2);
        return $pNumber * $pNumber;
    } else {
        return $number * powerNum($number, $pow - 1);
    }
}
echo powerNum(10,3);