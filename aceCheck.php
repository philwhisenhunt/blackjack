<?php

function aceCheck($cardValueArray){
    for($i=0; $i<count($cardValueArray); $i++){
        // echo 'The variable $cardValueArray[$i] is ' . $cardValueArray[$i] . "\n";
        if($cardValueArray[$i] == 11){
            //pop the card off the array, so that we can check for more aces.
            //probably should move this to a function.

            //should I pop that card off?

            //even better, count the number of things with a value of 11
            //ace count
            //loop through, and if the total is still above 21, then substract 10 each time. 
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

/*
Just build for four aces at first.
If there is an ace, then replace its value with one. Recalculate the sum.

If it is still more than 21, then calculate again, replacing the 11 with a 1, again. 