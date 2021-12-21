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
$sum = 0;
$score = 0;

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
    if($currentBoardLine < 6) {
        $gameBoard[$currentBoardLine-1] = $board;
        $currentBoardLine++;
    } else {
        $currentBoardLine = 1;
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
    // echo("Card $draw is $numberCalled <br>");
    //check the boards to see which boards have the number
    foreach ($deck as $boardKey => $board) {
        foreach($board as $rowKey => $row) {
            $rowWin = true;

            foreach ($row as $numberKey => $number) {
                if($number == $numberCalled) {
                    $deck[$boardKey][$rowKey][$numberKey] = "X";
                    // echo("$numberCalled found on board $boardKey, row $rowKey <br>");
                }
                if($deck[$boardKey][$rowKey][$numberKey] != 'X') {
                    $rowWin = false;
                }
                $columnWin = true;
                for($i =0; $i<5;$i++) {
                    if ($deck[$boardKey][$i][$rowKey] != "X") {
                        //columnWin
                        $columnWin = false;
                    }
                }
            }
            if($columnWin) {
                $sum = 0;
                echo("Column win, board: $boardKey <br>");

                //sum of all numbers on the board that were not called
                foreach($deck[$boardKey] as $check1) {
                   //var_dump($check);
                    $sum += array_sum($check1);
                }
                $score = $sum * $numberCalled;
                var_dump($deck);
                unset($deck[$boardKey]);
                echo("Sum is $sum and number called is $numberCalled <br>");
//                var_dump($score);
//                var_dump($draw);
//                var_dump($numberCalled);
//                var_dump($boardKey);
//                exit();
            }
            $columnWin = false;
            if($rowWin){
                $sum = 0;
                //calculate Score
                echo("Row Win, board: $boardKey <br>");
                $rowWin=false;
                //sum of all numbers on the board that were not called
                foreach($deck[$boardKey] as $check) {
                   // var_dump($check);
                    $sum += array_sum($check);
                }
                echo("Sum is $sum and number called is $numberCalled <br>");
              //  var_dump($sum);
                $score = $sum * $numberCalled;
                var_dump($score);
                unset($deck[$boardKey]);
//                //
//                var_dump($draw);
//                var_dump($numberCalled);
//                var_dump($boardKey);
//                var_dump($deck[$boardKey]);
//                exit();
            } $rowWin = false;
            //row loop
        }
    }
    //check if any boards have won

    //check if board has a complete row
    //check if board has a complete column
}
//boards
var_dump($deck);

 ?>


