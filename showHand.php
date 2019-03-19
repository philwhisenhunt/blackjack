<?php

function showHand($blackjackHand){
    foreach($blackjackHand as $card){
        echo $card . " ";
    }
    echo "\n";
}