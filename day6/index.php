<?php

$inputData = file_get_contents("testdata.txt");
//parse data
$arrayData = explode(",",$inputData);


for($i=1; $i < 257;$i++) {
    //each step
    echo("<br>Day $i");
    $newFish = 0;

    foreach ($arrayData as &$fish) {
        $fish--;
        if($fish < 0) { //if fish is less than 0
        $fish = 6;
        $newFish++;
        }
    }
    //add new fishes
    for($x=0; $x < $newFish; $x++) {
        $babyFish = 8;
        array_push($arrayData, $babyFish);
    }
    $fishies = count($arrayData);
   // echo("<br>There are $fishies Fish");
    //var_dump($arrayData);
}
$fishies = count($arrayData);
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