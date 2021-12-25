<?php

$inputData = file_get_contents("input.txt");
//parse data
$arrayData = explode(",",$inputData);
$days = 256;
//array to count how many fish are in each stage
$fishCount = [0,0,0,0,0,0,0,0,0];

//add initial fish values
foreach ($arrayData as $firstFish) {
    $fishCount[$firstFish]++;
}
//step through days
for($i=1; $i <= $days;$i++) {
    //each step
    //echo("<br>Day $i");
    //take the amount of fish at 0 and add them to [6]
    $newFish = array_shift($fishCount);
    $fishCount[6] += $newFish;
    array_push($fishCount, $newFish);
}
var_dump($fishCount);
$fishies = array_sum($fishCount);
echo("There are $fishies Fish");
//var_dump($arrayData);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="lang" content="en">
    <link rel="icon" type="image/x-icon" href="https://www.justsaysky.com/assets/favicon.ico">
    <title>Advent of Code 2021</title>
</head>
<body>
<h1>Advent of Code</h1>
<h2>Day 5</h2>
<p>This</p>
</body>
</html>