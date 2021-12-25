<?php
$inputData = file_get_contents("input.txt");
//parse data
$arrayData = explode("\n",$inputData);
$counter = 0;

foreach ($arrayData as $line) {
    $patterns = explode("|",$line);
    $segment = explode(" ", $patterns[0]);
    $output = explode(" ", $patterns[1]);

    foreach ($output as $item) {
        $length = strlen($item);
        //unique lengths
        if($length == 2)  {
            $counter++;
        }
        if($length == 4) {
            $counter++;
        }
        if($length == 3) {
            $counter++;
        }
        if($length == 7) {
            $counter++;
        }
    }

}
echo("Found unique size numbers $counter times");
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