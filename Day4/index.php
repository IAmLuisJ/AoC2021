<?php
$inputData = file_get_contents("input.txt");

//parse data
$arrayData = explode("\n",$inputData);
$numbersData = $arrayData[0];
$numbersCalled = explode(",", $numbersData);
//$gameBoards = explode("\n", $arrayData);

//list of numbers called in the game
var_dump($numbersCalled);
var_dump($gameBoards);

var_dump($arrayData);