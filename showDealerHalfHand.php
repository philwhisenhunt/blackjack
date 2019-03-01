<?php

function showDealerHalfHand($blackjackHand){
    echo "[] ";
    for($i=1; $i < count($blackjackHand); $i++){
        echo $blackjackHand[$i] . " ";
    }
    echo "\n";
}

//if isDealer, then don't print the first card. 