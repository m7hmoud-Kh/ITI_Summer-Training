<?php

//q1
echo "Welcome to php";


echo '<br>';

//q2
$x=5;
$y='Welcome';
$z=True;

var_dump($x,$y,$z);
echo '<br>';

//q3
define('NAME', 'ITI');

echo NAME;

echo '<br>';

//q4
$x = 5;
$y = 10;

echo ( ($x + $y) > 50 ) ? 'Accpted' : 'Not Accpted';

echo '<br>';
?>

<!-- q5 -->

<table style="border: 1px solid;text-align:center;" border="1">
<caption></caption>
<tr>
    <th>Name</th>
    <td><?= 'Mahmoud' ?></td>
</tr>
<tr>
    <th>Age</th>
    <td><?= 21 ?></td>

</tr>
</table>

<?php

function numberToString($num){
    return (string) $num;
}
var_dump(numberToString(99));
var_dump(numberToString(123));





