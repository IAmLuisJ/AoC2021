<?php
//hardcoded player start positions
$player1_pos = 2;
$player2_pos = 7;
//seven possible combinations of 3 sided dice roll (27 possible outcomes)
$dice = [[3,1],[4,3],[5,6],[6,7],[7,6],[8,3],[9,1]];

function game($player1_pos, $player2_pos, $player1_score = 0, $player2_score = 0) {
    global $dice;
    //array to cache/memoize the same outcome of a roll
    static $cache = [];
    $key = json_encode([$player1_pos, $player2_pos, $player1_score, $player2_score]);
    $win = $cache[$key] ?? false; // check if this win condition has already been cached
    if($win !== false) { //if win was found in the cache, return the result
        return $win;
    }
    //if roll was not found in the cache
    $win = [0,0];

    foreach($dice as $roll) {
        //each roll is a possible outcome
        $_player1_pos = $player1_pos + $roll[0];
        if ($_player1_pos > 10) {
            $_player1_pos -= 10;
        }
        $_player1_score = $player1_score + $_player1_pos;

        if($_player1_score >= 21) { // win condition
            $win[0] += $roll[1];
            continue;
        }
        $lose = game($player2_pos, $_player1_pos, $player2_score, $_player1_score);
        $win[1] += $lose[0] * $roll[1];
        $win[0] += $lose[1] * $roll[1];
    }

    $cache[$key] = $win;
    return $win;
}

$totalScore = game($player1_pos, $player2_pos);
$answer = max($totalScore);
echo("Player 1 won $totalScore[0] times<br>");
echo("Player 2 won $totalScore[1] times<br>");
echo("<br>Answer is $answer");

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
<h2>Day 21</h2>
<p>This</p>
</body>
</html>
