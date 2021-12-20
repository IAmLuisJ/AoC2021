<?php
$inputData = file_get_contents("input.txt");

//parse data
$arrayData = explode("\n",$inputData);
$numbersData = $arrayData[0];
$numbersCalled = explode(",", $numbersData);
$currentBoardLine = 0;
$boardSize = 5;
$gameBoards = [];
$deck = [];

foreach($arrayData as $line => $board) {
    //skip first line of numbers called
    if($line == 0){
        continue;
    }
    //parse game boards
    if($currentBoardLine == 0) {
        $currentBoardLine++;
        continue;
    }
    if($currentBoardLine < 5) {
        $gameBoard[$currentBoardLine-1] = $board;
        $currentBoardLine++;
        continue;
    } else {
        $currentBoardLine = 0;
        array_push($gameBoards, $gameBoard);
    }
}

//parse into multidimensional array to access each number
foreach($gameBoards as $num => $bingoBoard) {
    foreach ($bingoBoard as $key => $val){
        $deck[$num][$key] = preg_split('/\s+/', $val, 0, PREG_SPLIT_NO_EMPTY);
    }
}
//list of numbers called in the game
//var_dump($numbersCalled);

//loop through numbers called
foreach($numbersCalled as $draw => $numberCalled) {
    //draw a number
    $boardWin = false;
    //check the boards to see which boards have the number
    foreach ($deck as $boardKey => $board) {
        foreach($board as $rowKey => $row) {
            $rowWin = true;
            foreach ($row as $numberKey => $number) {
                if($number == $numberCalled) {
                    $deck[$boardKey][$rowKey][$numberKey] = "X";
                }
                if($deck[$boardKey][$rowKey][$numberKey] != 'X') {
                    $rowWin = false;
                }
            }
            if($rowWin){
                
                var_dump($draw);
                var_dump($numberCalled);
                var_dump($boardKey);

                exit();}
            //row loop
        }
    }
    //check if any boards have won

    //check if board has a complete row
    //check if board has a complete column
}
//boards

var_dump($deck);