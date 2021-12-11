<?php
$inputData = file_get_contents("input2.txt");

$arrayData = explode(",",$inputData);
//echo(sizeof($arrayData));
$optimal = 0;
//var_dump($arrayData);
$bestFuel=10000000000000000;

$highest = max($arrayData);
$lowest = min($arrayData);

foreach ($arrayData as $key => $value) {
    $currentFuel = 0;
    foreach ($arrayData as $key2 => $value2) {
        $diff = abs($value2-$value);
//        $fuelCost = ($diff/2) * ($diff + 1);
        $fuelCost = $diff * ($diff + 1) / 2;
//        if($value2 != $value) {
//            var_dump($value);
//            var_dump($value2);
//            echo($diff);
//            var_dump($fuelCost);
//            var_dump($currentFuel);
//            var_dump($bestFuel);
//            exit();
//        }
        $currentFuel = $currentFuel + $fuelCost;
        if($value == 984) {
            echo("Moving from $value2 to $value is $diff units and costs $fuelCost units of Fuel \r\n");
            echo("current fuel is $currentFuel");
            echo("<br>");
        }
    }

    if($currentFuel < $bestFuel) {
        $optimal = $value;
        $bestFuel = $currentFuel;
        echo("Setting optimal to $optimal which uses $bestFuel");
        echo("<br>");
    }
}

var_dump($currentFuel);
var_dump($bestFuel);
var_dump($optimal);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="lang" content="en">
    <link rel="icon" type="image/x-icon" href="https://www.justsaysky.com/assets/favicon.ico">
    <title>Advent of Code 2022</title>
</head>
<body>
<h1>Advent of Code</h1>
<h2>Day 7</h2>

</body>
</html>
