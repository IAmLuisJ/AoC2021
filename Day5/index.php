<?php

$inputData = file_get_contents("testdata.txt");

//parse data
$arrayData = explode("\n",$inputData);

$counter = 0;

//parse data
foreach($arrayData as $key => $value) {
    static $cache =[];
    $line = explode("->", $value);
    $from = trim($line[0]);
    $to = trim($line[1]);

    $xRange = explode(",", $from);
    $x1 = $xRange[0];
    $y1 = $xRange[1];

    $yRange = explode(",", $to);
    $x2 = $yRange[0];
    $y2 = $yRange[1];

    //x1, y1 -> x2 , y2
   echo("<br>The line is $x1 , $y1 -> $x2, $y2");
   //dont assume x2 > x1
    $distance = abs($x1 - $x2);
    for($x = $x1; $x <= $x2; $x++) {
        for($y = $y1; $y <= $y2; $y++) {
            echo("<br> [$x][$y] ");
            if($x == $x1 || $y == $y1){
                echo("<br> [$x][$y] ");
                $key = json_encode([$x,$y]);
                $cache[$key]++;
                if($cache[$key] >= 2) {$counter++;echo("overlap");}
            }
        }

    }
//    var_dump($cache);
//    exit();
}
var_dump($cache);
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