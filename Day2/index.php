<?php
$inputData = file_get_contents("input.txt");

$arrayData = explode("\n",$inputData);
echo(sizeof($arrayData));
$depth = 0;
$distance = 0;

foreach ($arrayData as $key => $value) {
    $line = explode(" ", $value);
    switch ($line[0]) {
        case "forward":
            $distance = $distance + $line[1];
            break;
        case "down":
            $depth = $depth + $line[1];
            break;
        case "up":
            $depth = $depth - $line[1];
            break;
        default:

    }
}
var_dump($depth);
var_dump($distance);
echo($depth * $distance);

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
<h2>Day 2</h2>

</body>
</html>
