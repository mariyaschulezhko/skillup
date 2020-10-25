<?php
function printR(array $data, string $a = ''): string {
    $a .= '&nbsp;&nbsp;&nbsp;&nbsp;';
    $arrayInfo = "{$a}array(".count($data).") {<br>";
    foreach ($data as $key => $value){
        $quotes = (is_integer($key) || is_float($key) ? '' : '&quot;');
        if (is_array($value)){
            $arrayInfo .= "{$a}[{$quotes}{$key}{$quotes}] =><br>";
            $arrayInfo .= printR($value, $a);
        }else{
            switch (gettype($value)){
                case 'NUULL':
                    $valueInfo = 'NuLL';
                    break;
                case'string':
                    $valueInfo = 'string(' . strlen($value) . ') &quot;' . $value . '&quot;';
                    break;
                case 'integer':
                    $valueInfo = "int({$value})";
                    break;
                default:
                    $valueInfo = "otherType({$value})";

            }
            $arrayInfo .= "{$a}[{$quotes}{$key}{$quotes}]=><br>{$a}{$valueInfo}<br>";
        }
    }
    return "{$arrayInfo}{$a}}<br>";
}






function arrayCount(array $data, bool $countParent = true):int
{
    $numberOfElements = count($data);
    foreach ($data as $element){
        if (is_array($element)){
            if (!$countParent){
                $numberOfElements-- ;

            }
            $numberOfElements += arrayCount($element, $countParent);

        }
    }
    return $numberOfElements;
}
$testArray =
    [
        'a' => 1,
        'b' => 2,
        'c' => 3,
        'd' => 4,
        'other' =>
            [
                'red' => 5,
                'blakc' => 6,
                'green' =>
                    [
                        's' => 7,
                        'y' => 8,
                        'id' =>
                            [
                                1111,
                                2222,
                                3333,
                            ],
                    ],
            ],
    ];
$recursiveVarDump = printR($testArray);
$countWithoutParents = arrayCount($testArray, false);
$countWithParents = arrayCount($testArray,true);
var_dump ($countWithParents);
