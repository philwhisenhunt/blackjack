<?php

require 'cardValueMaker.php';

function calculateHandValue($playerHand){ //[2H, 9S]

    $cardValueArray= [];

    //loop through every card
    for($i=0; $i<count($playerHand); $i++){

        //take each card and turn it into an array (of two letters or numbers)
        $splitHand = str_split($playerHand[$i]); //2H $playerHand[i][0]
        //[2,H]

    //get the value or whatever the first card is (without the suit)
    $cardValueArray[] = cardValueMaker($splitHand[0]);
    //[2,9]
    //echo "The cardValueArray is ";
    //print_r($cardValueArray);
    

    //echo "The cardValueArray is ";
    //print_r($cardValueArray);
    }
    return array_sum($cardValueArray);

}