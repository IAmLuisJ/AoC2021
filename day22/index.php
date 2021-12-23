<?php

$inputData = file_get_contents("testData3.txt");

//parse data
$arrayData = explode("\n",$inputData);
$cubeCount = 0;
$onCount = 0;
$offCount = 0;
$switchStep = "";

try {
    foreach ($arrayData as $key => $step) {
        $switchStep = substr($step, 0, 3);
        // echo("This step we will be turning $switchStep<br>");
        $val = substr($step, 3);
        $coordinates = explode(",", $val);

        $xVal = explode("=", $coordinates[0]);
        $xRange = explode("..", $xVal[1]);

        if($xRange[0] > 50) {
            continue;
            $xRange[0] = 50;
        }
        if($xRange[0] < -50) {
            continue;
            $xRange[0] = -50;
        }
        if($xRange[1] > 50) {
            continue;
            $xRange[1] = 50;
        }
        if($xRange[1] < -50) {
            continue;
            $xRange[1] = -50;
        }
        $yVal = explode("=", $coordinates[1]);
        $yRange = explode("..", $yVal[1]);
//        if($yRange[0] > 50) {
            continue;
            $yRange[0] = 50;
        }
        if($yRange[0] < -50) {
            continue;
            $yRange[0] = -50;
        }
        if($yRange[1] > 50) {
            continue;
            $yRange[1] = 50;
        }
        if($yRange[1] < -50) {
            continue;
            $yRange[1] = -50;
        }

        $zVal = explode("=", $coordinates[2]);
        $zRange = explode("..", $zVal[1]);

        if($zRange[0] > 50) {
            continue;
            $zRange[0] = 50;
        }
        if($zRange[1] > 50) {
            continue;
            $zRange[1] = 50;
        }
        if($zRange[0] < -50) {
            continue;
            $zRange[0] = -50;
        }
        if($zRange[1] < -50) {
            continue;
            $zRange[1] = -50;
        }

        static $onCubes = [];
        //loop through cube[x][y][z]
        for($x=intval($xRange[0]);$x<=intval($xRange[1]);$x++) {
            for($y=intval($yRange[0]);$y<=intval($yRange[1]);$y++) {
                for($z=intval($zRange[0]);$z<=intval($zRange[1]);$z++) {
                    //loops through the cubes in the range
                    //turn them on or off and increment
                    //  echo("[$x][$y][$z]<br>");
                    //check cache
                    $key = json_encode([$x,$y,$z]);
                    $currentCube = $onCubes[$key] ?? false;
                    if($switchStep == "off") {
                        //off
                        if($currentCube == "on ") {
                            //if cube is already on turn off
                            $cubeCount--;
                            $offCount++;
                            unset($onCubes[$key]);
                            //    echo("turning cube off");
                        }
                    }

                    if($currentCube == "on ") {
                        //if cube is already on skip
                        // echo("already on");
                        continue;
                    }
                    //I don't think I need to cache off?
//                if($onCubes[$key] == "off") {
//                    //if cube is already off skip
//                    unset($onCubes[$key]);
//                    echo("turning cube off");
//                }

                    if($switchStep == "on ") {
                        //on
                        $onCubes[$key] = $switchStep;
                        $cubeCount++;
                        $onCount++;
                    }
                }
            }
        }
        //   echo("After this step the count is $cubeCount, wth $onCount cubes turned on and $offCount turned off <br>");
    }
}catch (Exception $exception) {
    echo($exception->getMessage());
}


echo("The total count is $cubeCount, wth $onCount cubes turned on and $offCount turned off <br>");
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
<h2>Day 22</h2>
<p>This</p>
</body>
</html>