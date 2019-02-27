<?php

function cardValueMaker($pieceOfCard){
    
     if($pieceOfCard == "J"){
        return $value = 10;
    }

    if($pieceOfCard == "Q"){
        return $value = 10;
    }

    if($pieceOfCard == "K"){
        return $value = 10;
    }

    //This will need to have a condition where it runs again for totals over 21, to make sure 1 wouldn't work

    if($pieceOfCard == "A"){
        return $value = 11;
    }

    if($pieceOfCard == "9"){
        return $value = 9;
    }
}
   
