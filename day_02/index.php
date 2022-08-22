<?php

//q1

// first method

for ($i=0; $i <= 15 ; $i++) {
    echo $i . "<br>";
}

//second method
$a = 0;
while ($a <= 15) {
    echo $a . "<br>";
    $a++;
}

//q2
$var1 = 5;
echo gettype($var1);

echo isset($var1);

var_dump(empty($var1));



$arr = array('PHP', 'Open','Source','ITI', 'Day2', 'Arrays');
//first method
foreach ($arr as $ele) {
    echo $ele . "<br>";
}

//second method

for ($i=0; $i < count($arr) ; $i++) {
    echo $arr[$i] . "<br>";

}

$file_info = fopen('userInfo.txt','r');
$text = fread($file_info,filesize('userInfo.txt'));

echo $text;
fclose($file_info);