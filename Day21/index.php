<?php
$player1_pos = 2;
$player2_pos = 7;

$dice = range(1,100);
$dice_current = 0;
$gameBoard = 10;
$player1_score = 0;
$player2_score = 0;
$dice_rolls = 0;
$game = true;
$dice1 = 0;
$dice2 = 0;
$dice3 = 0;

function diceRoll(): int {
    global $dice_rolls;
    global $dice;
    global $dice_current;
    $dice_rolls +=3;
    echo("<br>Current dice is $dice_current");
    if($dice_current > 99) {
        $dice_current -= 100;
    }
    $dice1 = $dice[$dice_current];
    $dice2 = $dice[$dice_current + 1];
    $dice3 = $dice[$dice_current + 2];
    if($dice_current + 1 > 99) {
        $dice2 = 1;
        $dice3 = 2;
    } elseif($dice_current + 2 > 99) {
        $dice3 = 1;
    }
    echo("<br>Current dice is $dice_current");
    $dice_current += 3;
    echo("<br>after roll dice is $dice_current");
    echo("<br> Dice1 is $dice1");
    echo("<br> Dice2 is $dice2");
    echo("<br> Dice3 is $dice3");
    echo("<br> Roll Complete<br>");
    return $dice1 + $dice2 + $dice3;
}

while($game) {

    //player rolls the dice 3 times
    $totalMoves = diceRoll();

    //player 1
    echo("<br> player 1 rolled $totalMoves");
    $move = $totalMoves % 10;
    if(($player1_pos + $move) > 10) {
        $move -= 10;
    }

    $player1_temp = $player1_pos + $move;
    echo("<br> player 1 moving from $player1_pos to $player1_temp <br>");
    $player1_pos = $player1_pos + $move;
    $player1_score += $player1_pos;
    echo("<br> player 1 score is now $player1_score");

    $totalMoves = diceRoll();
    //player2
    $move = $totalMoves % 10;
    if (($player2_pos + $move) > 10) {
        $move -= 10;
    }
    $player2_pos = $player2_pos + $move;
    $player2_score += $player2_pos;
    echo("<br> player 2 score is now $player2_score");

    if($player1_score > 1000) {
        $game = false;
        $answer = $dice_rolls * $player2_score;
    }
    if($player2_score > 1000) {
        $game = false;
        $answer = $dice_rolls * $player1_score;
    }
}

echo("<br>Answer is $answer");
echo("<br>Dice was rolled a total of $dice_rolls times");
echo("Player 1 score was $player1_score");
echo("Player 2 score was $player2_score");
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
