<?php

require 'cardValueMaker.php';

function calculateHandValue($playerHand){

    $cardValueArray= [];

    //loop through every card
    for($i=0; $i<count($playerHand); $i++){

        //take each card and turn it into an array (of two letters or numbers)
        $splitHand = str_split($playerHand[$i]); 

    //get the value or whatever the first card is (without the suit)
    $cardValueArray[] = cardValueMaker($splitHand[0]);
    //echo "The cardValueArray is ";
    //print_r($cardValueArray);
    

    //echo "The cardValueArray is ";
    //print_r($cardValueArray);
    }
    return array_sum($cardValueArray);

}