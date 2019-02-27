<?php
echo "hello \n";



$cardName = "8C";
$topLineRow = [" ","-","-","-","-","-", " ","-","-","-","-","-"];
$cardNameRow = ["|",$cardName," "," "," ", "|", "|",$cardName," "," "," ", "|"];
$spaceAndBars = ["|"," "," "," "," ", " |", "|"," "," "," "," ", " |"];
$bottomLineRow = [" ","-","-","-","-", " ","-","-","-","-"];

//Reserve this
// $cardName = "8C";
// $topLineRow = [" ","-","-","-","-","-"];
// $cardNameRow = ["|",$cardName," "," "," ", "|"];
// $spaceAndBars = ["|"," "," "," "," ", " |"];
// $bottomLineRow = [" ","-","-","-","-"];

$mergeArray = [];
$mergeArray[] = $topLineRow;
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