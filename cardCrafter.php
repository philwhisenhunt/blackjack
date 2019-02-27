<?php
echo "Dealing... \n";
$numberOfCards = 3;
//for the number of cards, add this => ," ","-","-","-","-","-"
//but to add each one, I may need to copy each element one by one. Pop it over?

$cardName = "8C";
// $topLineRow = [" ","-","-","-","-","-", " ","-","-","-","-","-"];
$topLineRow = [" ","-","-","-","-","-"];

$cardNameRow = ["|",$cardName," "," "," ", "|", "|",$cardName," "," "," ", "|"];
$spaceAndBars = ["|"," "," "," "," ", " |", "|"," "," "," "," ", " |"];
$bottomLineRow = [" ","-","-","-","-", " ","-","-","-","-"];

$megaRow = [];
for($i=0; $i < $numberOfCards; $i++){
    for($j=0; $j<count($topLineRow); $j++)
    $megaRow[] = $topLineRow[$j];
    // echo "Round \n";
}

// print_r($megaRow);
// die();


//Reserve this
// $cardName = "8C";
// $topLineRow = [" ","-","-","-","-","-"];
// $cardNameRow = ["|",$cardName," "," "," ", "|"];
// $spaceAndBars = ["|"," "," "," "," ", " |"];
// $bottomLineRow = [" ","-","-","-","-"];

$mergeArray = [];
// $mergeArray[] = $topLineRow;
$mergeArray[] = $megaRow;
$mergeArray[] = $cardNameRow;
$mergeArray[] = $spaceAndBars;
$mergeArray[] = $spaceAndBars;
$mergeArray[] = $bottomLineRow;
//$mergeArray[] = $testArray1;

//print_r($mergeArray);

for($i=0; $i < count($mergeArray); $i++){
    for($j=0; $j<count($mergeArray[$i]); $j++){
        echo $mergeArray[$i][$j];
        // echo "   ";
        // echo $mergeArray[$i][$j];
    }
   echo "\n";
}

//but how to get the cards all displaying side by side?

/*
For the count of the playerHand, echo the line.

*/