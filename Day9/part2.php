<?php
$inputData = file_get_contents("testdata.txt");
//parse data
$arrayData = explode("\n",$inputData);
$counter = 0;
$map = [];
$lowPoints = [];
$basins = [];

foreach ($arrayData as $key => $val) {
    $map[$key] = str_split($val);
}

function printBasin() {
    global $map;
    foreach ($map as $x1 => $row) {
        echo("<br>");
        foreach ($row as $y1 => $point) {
            echo("$point");
        }
    }
}

//search for low points
//extract to function and do recrussive to find basins
foreach ($map as $x1 => $row) {
    foreach ($row as $y1 => $point) {
        //check adjascent tiles
        $above = $map[$x1-1][$y1] ?? 10;
        $below = $map[$x1+1][$y1] ?? 10;
        $left = $map[$x1][$y1-1] ?? 10;
        $right = $map[$x1][$y1+1] ?? 10;
        if ($point < $above && $point < $below && $point < $left && $point < $right) { //if lowest point
            echo("<br>Low Point at [$x1][$y1] with value of $point");
            $risk = $point + 1;
            array_push($lowPoints, $risk);

            returnBasinNeighbors($x1, $y1);
        }


    }
}

//for each low point, find the points in that basin
function returnBasinNeighbors($x, $y) {
    static $noNeighbors = false;

    //check adjascent tiles
    $above = $map[$x-1][$y] ?? 10;
    $below = $map[$x+1][$y] ?? 10;
    $left = $map[$x][$y-1] ?? 10;
    $right = $map[$x][$y+1] ?? 10;


}

var_dump(array_sum($lowPoints));



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
<h2>Day 9</h2>

</body>
</html>