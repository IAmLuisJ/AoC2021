<?php
$inputData = file_get_contents("example.txt");
$table = array();
$counter = 0;
$flashCount = 0;
$newFlash = false;
//parse data
$arrayData = explode("\n",$inputData);
foreach ($arrayData as $item => $key) {
    $table[$item] = str_split($key);
}

for($i=0;$i<100;$i++) {
    printTable();
    $newFlash = true;
    foreach ($table as $squid => $value) {
            foreach ($value as $octopus => $newVal) {
                //loop through each item, add 1 power
                $table[$squid][$octopus] = intval($newVal)+1;
            }
    }
    //loop through 100 steps
    step();
while($newFlash) {
    $newFlash = false;
    foreach ($table as $squid2 => $value2) {
        foreach ($value2 as $octopus2 => $newVal2) {
            //loop through each item to see if it is now over 9
            //check if any flashed
            if ($table[$squid2][$octopus2] > 9) {
                //if unit flashed
                $vla2 = $table[$squid2][$octopus2];
                echo("<br> unit flashed at x: $squid2 and y: $octopus2 with value of $vla2 <br>");
                printTable();
                $flashCount++;
                //add 1 power to adjacent octopus
                //above
                if ($squid2 != 0) {
                    $table[$squid2 - 1][$octopus2] += 1;
                }
                //below
                if ($squid2 != 9) {
                    $table[$squid2 + 1][$octopus2] += 1;
                }
                //to left
                if ($octopus2 != 0) {
                    $table[$squid2][$octopus2 - 1] += 1;
                }
                //to right
                if ($octopus2 != 9) {
                    $table[$squid2][$octopus2 + 1] += 1;
                }

                //diagonal
                //top left
                if ($squid2 != 0 && $octopus2 != 0) {
                    $table[$squid2 - 1][$octopus2 - 1] += 1;
                }
                //top right
                if ($squid2 != 0 && $octopus2 != 9) {
                    $table[$squid2 - 1][$octopus2 + 1] += 1;
                }
                //bottom left
                if ($squid2 != 9 && $octopus2 != 0) {
                    $table[$squid2 + 1][$octopus2 - 1] += 1;
                }
                //bottom right
                if ($squid2 != 9 && $octopus2 != 9) {
                    $table[$squid2 + 1][$octopus2 + 1] += 1;
                }
                $newFlash = true;
                $table[$squid2][$octopus2] = 0;
            }
            //check if any flashed again?
        }
    }
}
}


var_dump($flashCount);


function step() {
    //every step should iterate through array and add power to octopus and flash if they go over 9
    global $counter;
    global $flashCount;
    $counter++;
    echo("<br>".$flashCount."<br>");
}

function flash() {

}

function printTable() {
    global $table;
    foreach ($table as $td => $tVal) {
        echo("<br>");
             foreach ($tVal as $cell) {
                 echo(" ".$cell." ");
     }
    }

}

var_dump($counter);
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
<h2>Day 11</h2>
<table>
    <tbody>
    <?php foreach ($table as $td => $tVal): ?>
        <tr>
        <?php foreach ($tVal as $cell): ?>
            <td>
                <?php echo($cell) ?>
            </td>
    <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>
