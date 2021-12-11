<?php

$inputData = file_get_contents("input.txt");

$arrayData = explode("\n",$inputData);
echo(sizeof($arrayData));

$count = 0;
foreach ($arrayData as $key => $value) {
    $next = $key+1;
    $nextNext = $key+2;
    $nextNextNext = $key+3;
    $Firstwindow = $value + $arrayData[$next] + $arrayData[$nextNext];
    $Secondwindow = $arrayData[$next] + $arrayData[$nextNext] + $arrayData[$nextNextNext];
    if($Firstwindow < $Secondwindow) {
        $count++;
    }
}
var_dump($key);
var_dump($value);
var_dump($next);
var_dump($arrayData[$next]);
var_dump($count);
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
<h2>Day 1</h2>

</body>
</html>
