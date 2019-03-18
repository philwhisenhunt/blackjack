<?php

function aceCheck($cardValueArray){
    //if(array_sum($cardValueArray) > 21){
        echo "Running \n";
        while(in_array(11, $cardValueArray) && array_sum($cardValueArray) > 21){
            //echo "The while statement is still true";
            for($i=0; $i<count($cardValueArray); $i++){
                // echo 'The variable $cardValueArray[$i] is ' . $cardValueArray[$i] . "\n";
                echo '$i is at ' . $i . "\n";
                if($cardValueArray[$i] == 11){
                    $cardValueArray[$i] = 1;
                    //echo '$cardValueArray[$i] is ' . $cardValueArray[$i] . "\n";
                    //echo '$cardValueArray value is ' . array_sum($cardValueArray) . "\n";
    
                    if(array_sum($cardValueArray) < 21 ){
                        echo "Success! \n"; 
                        return array_sum($cardValueArray);
    
                    }
                    // else{
                    //     return array_sum($cardValueArray);
                    // }
    
        
                }
           
            }
            
        }
        return array_sum($cardValueArray); 

        
        
    //}
    // else{
    //     echo "Hit the else statement";
    //     return array_sum($cardValueArray);
    // }
   
}

/*
Just build for four aces at first.
If there is an ace, then replace its value with one. Recalculate the sum.

If it is still more than 21, then calculate again, replacing the 11 with a 1, again. 

Loop through everything in the array.
At each point, check if it is an ace. 

If an ace, subtract 10.
If less than 21, then return value
Else, run the function again (recursion)


*/

 /*
 from if loop
            //pop the card off the array, so that we can check for more aces.
            //probably should move this to a function.

            //should I pop that card off?

            //even better, count the number of things with a value of 11
            //ace count
            //loop through, and if the total is still above 21, then substract 10 each time. 
            $playerHandValue -= 10;
            echo 'The $playerHandValue is ' . $playerHandValue . "\n";

            */