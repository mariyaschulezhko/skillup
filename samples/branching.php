<?php
$number = (int)$_GET['p1'];
var_dump($_GET);
if ((int)$_GET['p1'] %2===0){
    echo"Number{$number} is even";
} else{
    echo"Number{$number} is odd";

}
echo '<br>';

echo $number %2 ===0 ? "Number{$number} is even" : "Number{$number} is odd";