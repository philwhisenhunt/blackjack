<?php

function aceCheck($cardValueArray){
    
        while(in_array(11, $cardValueArray) && array_sum($cardValueArray) > 21){
            //echo "The while statement is still true";
            for($i=0; $i<count($cardValueArray); $i++){
                // echo 'The variable $cardValueArray[$i] is ' . $cardValueArray[$i] . "\n";
                // echo '$i is at ' . $i . "\n";
                if($cardValueArray[$i] == 11){
                    $cardValueArray[$i] = 1;
                    //echo '$cardValueArray[$i] is ' . $cardValueArray[$i] . "\n";
                    //echo '$cardValueArray value is ' . array_sum($cardValueArray) . "\n";
    
                    if(array_sum($cardValueArray) < 21 ){
                        //echo "Success! \n"; 
                        return array_sum($cardValueArray);
    
                    }
    
        
                }
           
            }
            
        }//end of while statement
        return array_sum($cardValueArray); 
}