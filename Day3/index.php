<?php
//pull in data
$inputData = file_get_contents("input.txt");

//parse data
$arrayData = explode("\n",$inputData);

//size of array (should be 1000 lines in dataset)
echo(sizeof($arrayData));
var_dump($arrayData[0]);

//variables
//$gammaRate =  001100001011;

$epsilionRate= 3316;
$gammaRate = 779;
$newArray = array();
$totalArray = array();
$counter = 0;
//loop through each column (12 columns)
for($i=0;$i<12;$i++) {
    $counter = 0;
    //loop through each item and parse only one number (substring from i to i+1)
    //for example newArray[0] = substring(10001, 0, 1) = 1
    foreach ($arrayData as $item => $key) {
        $value = substr($key, $i, 1);
        //$newArray[$item] = $value;
        $counter += intval($value);

    }
    $totalArray[$i] = $counter;
    echo("$counter"." \r\n");
    $counter = 0;
}
var_dump($totalArray);
echo(sizeof($newArray));
var_dump($newArray);

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
