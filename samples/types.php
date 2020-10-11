<?php
$int = 1;
/** @var TYPE_NAME $float */
$float = 1.0;
$bool = true;
$array = [1];
$object = new stdClass();
$null = null;
$resource = fopen(__DIR__ . '/basics.php','rb');
$callable = static function (){
    return 1;
};
//var_dump($object,$resource,$callable);
//var_dump($callable());
//var_dump(gettype($object));
var_dump((string)$int);
fclose($resource);

