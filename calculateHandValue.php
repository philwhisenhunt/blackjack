<?php

require 'cardValueMaker.php';

function calculateHandValue($playerHand){

    $cardValueArray= [];
    for($i=0; $i<count($playerHand); $i++){
        $splitHand = str_split($playerHand[$i]);

    $cardValueArray[] = cardValueMaker($splitHand);
    echo "The cardValueArray is ";
    print_r($cardValueArray);

    //echo "The cardValueArray is ";
    //print_r($cardValueArray);
    }
    return array_sum($cardValueArray);

}