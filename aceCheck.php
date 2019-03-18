<?php

function aceCheck($cardValueArray){
    for($i=0; $i<count($cardValueArray); $i++){
        // echo 'The variable $cardValueArray[$i] is ' . $cardValueArray[$i] . "\n";
        if($cardValueArray[$i] == 11){
            //pop the card off the array, so that we can check for more aces.
            //probably should move this to a function.
            $playerHandValue -= 10;
            echo 'The $playerHandValue is ' . $playerHandValue . "\n";
        }
        //is this the best way to add recursion?
        if($cardValueArray > 21){
            aceCheck($cardValueArray);
        }
    }

        //add recursion?
        return $playerHandValue;

}