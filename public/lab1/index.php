<?php
echo "Hello World! :) <br>";
/// The code is printing "Hello World! :)

//2 Task
$x = 5;
$y = "Vova";
$a = true;
$b = 67.67;

echo $x, $y, $a, $b;
echo "<br>";

var_dump(5);
var_dump("vova");
var_dump(true);
var_dump(67.67);
echo "<br>";

//3 Task
$A = "Vova";
$B = "Horielov";
echo $A, $B;
echo "<br>";

//4 Task
$q = 12;

if ($q % 2 == 0) {
    echo "Its true <br>";
} else {
    echo "Its false <br>";
}

//5 Task
for ($i = 1; $i <= 10; $i++) {
    echo $i;
}
echo "<br>";

$j = 10;
while ($j >= 1) {
    echo $j;
    $j--;
}
echo "<br>";

//6 Task
$student = array("first_name"=>"Volodymyr", "last_name"=>"Horielov", "age"=>19, "occupation"=>"computer scince");

foreach ($student as $i => $j) {
    echo "$i: $j <br>";
}

$student["average_score"] = "5";


foreach ($student as $i => $j) {
    echo "$i: $j <br>";
}