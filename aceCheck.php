<?php

function aceCheck($cardValueArray){
    
        while(in_array(11, $cardValueArray) && array_sum($cardValueArray) > 21){
            //echo "The while statement is still true";
            for($i=0; $i<count($cardValueArray); $i++){
                
                //Change the value of an ace to 1
                if($cardValueArray[$i] == 11){
                    $cardValueArray[$i] = 1;
                    
                    //then check if that was enough to reduce it below 22
                    if(array_sum($cardValueArray) < 21 ){
                        //echo "Success! \n"; 
                        return array_sum($cardValueArray);
    
                    }
    
        
                }
           
            }
            
        }//end of while statement
        return array_sum($cardValueArray); 
}