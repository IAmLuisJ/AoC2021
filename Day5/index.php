<?php

$inputData = file_get_contents("input.txt");

//parse data
$arrayData = explode("\n",$inputData);

$counter = 0;

//parse data
foreach($arrayData as $key => $value) {
    static $cache =[];
    $line = explode("->", $value);
    $from = trim($line[0]);
    $to = trim($line[1]);

    //get the starting coords
    $xRange = explode(",", $from);
    $x1 = intval($xRange[0]);
    $y1 = intVal($xRange[1]);

    //get the ending coords
    $yRange = explode(",", $to);
    $x2 = intval($yRange[0]);
    $y2 = intval($yRange[1]);

  //  echo("<br>The line is $x1 , $y1 -> $x2, $y2<br>");

    //x1, y1 -> x2 , y2
   echo("<br>The line is $x1 , $y1 -> $x2, $y2");
   //dont assume x2 > x1
    $xRange = range($x1, $x2);
    foreach($xRange as $point) {
       // echo(" <br> point [$point][$y1] ");
        if($y1 == $y2) {
                echo(" <br> line [$point][$y1] ");
                $key = json_encode([$point,$y1]);
                $cache[$key]++;
                if($cache[$key] == 2) {$counter++;echo("overlap");}
            }
    }
    $yRange = range($y1, $y2);
    foreach ($yRange as $point2) {
        if($x1 == $x2) {
            echo(" <br> line [$x1][$point2] ");
            $key = json_encode([$x1,$point2]);
            $cache[$key]++;
            if($cache[$key] == 2) {$counter++;echo("overlap");}
        }
        echo(" <br> point [$x1][$point2] ");
    }
    //check for diagonal lines
    $xlength = count($xRange);
    $ylength = count($yRange);
    if ($xlength == $ylength) {
        echo("<br>line is diagonal");
        $yCount = 0;
        $yStart = $yRange[0];
        foreach($xRange as $xVal) {
           // echo(" <br> line [$xVal]$yRange[$yCount] ");
            $key = json_encode([$xVal,$yRange[$yCount]]);
            $yCount++;
            $cache[$key]++;
            if($cache[$key] == 2) {$counter++;echo("overlap");}
        }
    }
}

echo("overlaps = $counter");
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