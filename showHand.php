<?php

function showHand($blackjackHand){
    foreach($blackjackHand as $card){
        echo $card . " ";
    }
    echo "\n";
}

//if isDealer, then don't print the first card. 