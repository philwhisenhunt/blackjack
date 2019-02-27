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

    if($pieceOfCard == "T"){
        return $value = 10;
    }

    if($pieceOfCard == "9"){
        return $value = 9;
    }

    if($pieceOfCard == "8"){
        return $value = 8;
    }

    if($pieceOfCard == "7"){
        return $value = 7;
    }

    if($pieceOfCard == "6"){
        return $value = 6;
    }

    if($pieceOfCard == "5"){
        return $value = 5;
    }

    if($pieceOfCard == "4"){
        return $value = 4;
    }

    if($pieceOfCard == "3"){
        return $value = 3;
    }

    if($pieceOfCard == "2"){
        return $value = 2;
    }
}
   
