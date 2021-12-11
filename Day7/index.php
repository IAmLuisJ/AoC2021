<?php
$inputData = file_get_contents("input.txt");

$arrayData = explode(",",$inputData);
echo(sizeof($arrayData));
$optimal = 0;
var_dump($arrayData);
$bestFuel=10000000;

foreach ($arrayData as $key => $value) {
    $currentFuel = 0;

    foreach ($arrayData as $key2 => $value2) {
        $fuelCost = abs($value2-$value);
        $currentFuel = $currentFuel + $fuelCost;
    }

    if($currentFuel <= $bestFuel) {
        $optimal = $value;
        $bestFuel = $currentFuel;
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
