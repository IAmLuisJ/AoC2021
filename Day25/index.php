<?php
$inputData = file_get_contents("input.txt");
//parse data
$arrayData = explode("\n",$inputData);
$counter = 0;
$move = true;
$xLength = strlen($arrayData[0]);
$yLength = sizeof($arrayData);
$seaCucumbers = [];
$bounds = false;

//function to print
function printSea() {
    global $seaCucumbers;
    foreach ($seaCucumbers as $key3=>$row3) {
        echo("<br>");
        foreach ($row3 as $fish) {
            echo(" $fish ");
        }
    }
}

//newcucumbers - only modify new array, then copy that array back to the first array
foreach($arrayData as $key => $line) {
    $cucumber = str_split($line, 1);
    foreach ($cucumber as $key2 => $item) {
        $seaCucumbers[$key][$key2] = $item;
    }
}

$newCucumbers = $seaCucumbers;
//while sea cucumbers move, keep stepping until no one moves
while($move) {
   // printSea();
    $counter++;
   // echo("<br>step $counter<br>");
    $move = false;

    //loop through and move > if there is space
    //shift array end
    foreach ($seaCucumbers as $x => $row) {
        //pull out top row to compare against
        foreach ($row as $y => $unit) {
            $bounds = false;
            if($unit == ">") { //if unit is east unit
                //if neighbor is the last one, shift the array
                $neighbor = $seaCucumbers[$x][$y+1];
                if($neighbor == null) {
                    //shift array
                    $neighbor = $seaCucumbers[$x][0];
                    $bounds = true;
                }
                if ($neighbor == ".") {  //space is empty, move unit
                    $move = true;
                    $newCucumbers[$x][$y] = ".";
                    if($bounds) {
                        $newCucumbers[$x][0] = ">";
                     //   echo("<br>Moving unit [$x][$y] to first column");
                    } else {
                        $newCucumbers[$x][$y+1] = ">";
                    //    echo("<br>Moving unit [$x][$y] to right");
                    }
                } else {
                  //  echo("<br>Cannot move unit at [$x][$y]");
                }
            }
        }
    }
    $seaCucumbers = $newCucumbers;
    foreach ($seaCucumbers as $x1 => $row1) {
        //loop through and move v if there is space
        foreach ($row1 as $y1 => $unit1) {
            $bounds2 = false;
            if($unit1 == "v") {
                //neighbor is unit below
                $neighbor = $seaCucumbers[$x1+1][$y1];
                if($neighbor == null) { //if unit is the last in the array, shift
                    $neighbor = $seaCucumbers[0][$y1];
                    $bounds2 = true;
                }
                if ($neighbor == ".") {
                    $move = true;
                    $newCucumbers[$x1][$y1] = ".";
                    if($bounds2) {
                        $newCucumbers[0][$y1] = "v";
                        $bounds2 = false;
                      //  echo("<br>Moving unit [$x1][$y1] to top row");
                    } else {
                        $newCucumbers[$x1+1][$y1] = "v";
                      //  echo("<br>Moving unit [$x1][$y1] down");
                    }
                } else {
                  //  echo("<br>Cannot move unit at [$x1][$y1]");
                }
              }//checking unit type
            }//second loop
        }//first loop
    $seaCucumbers = $newCucumbers;
//    if($counter == 58) {
//        printSea();
//        // var_dump($seaCucumbers);
//        exit();
//    }
    }
    //if something moves, set move to true;

echo("<br>Nothing moves on day $counter");
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
<h2>Day 25</h2>

</body>
</html>