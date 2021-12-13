<?php
$inputData = file_get_contents("input.txt");
$current ="start";
$traveling = true;
//parse data
$arrayData = explode("\n",$inputData);
$pathData = array();
foreach ($arrayData as $line => $key) {
    $caveData = explode("-", $key);
    $pathData[$line] = array($caveData[0],$caveData[1]);
}

while($traveling) {
    foreach ($pathData as $road => $path) {
        if($road == 5) {
            var_dump($path);

        }
        if($current == $path[0]) {
           // unset($pathData[$road]);
            $current = $path[1];
            echo("<br>Moving from $path[0] to $path[1] <br>");
            if($current == "end") {
                $traveling = false;
                echo("No longer traveling");
            } else {
                $traveling = true;
            }
        } else {
            $deadEnd = true;

        }
    }
    $traveling = false;
}


var_dump($pathData);
var_dump($arrayData);
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
<p>This</p>
</body>
</html>