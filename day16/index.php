<?php
$inputData = file_get_contents("input.txt");
$data = base_convert($inputData, 16, 2);
var_dump($data);
//parse data
$packetVersion = substr($inputData, 0, 3);
$typeID = substr($inputData, 2,3);

//size of array (should be 1000 lines in dataset)
var_dump($packetVersion);
var_dump($typeID);

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
<h2>Day 16</h2>
<p>This</p>
</body>
</html>

