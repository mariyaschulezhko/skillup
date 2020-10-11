<?php
$number = 2;
echo $number < 0 ? 'Number is zero':
    $number === 1 ? 'Number is one ':
         $number === 2 ? 'Nomber is two':
             $number %2 === 0 ? "Nomber {$number} is even": "Number {$number} odd";

