<?php
require 'showHand.php';
require "calculateHandValue.php";
$dealerHandValue = 0;
$playerHandValue = 0;
$playersCards = [];
$dealersCards = [];

$cards = ['AH','JC', 'KH', '2C', 'JH' ];

$playersCards[] = array_pop($cards);
$playersCards[] = array_pop($cards);
showHand($playersCards);

while ($dealerHandValue < 17) {
    //echo "Bet or stay?";
    $line = readline("Type b to bet or s for stand \n");

    if ($line === "b"){
        
        $playersCards[] = array_pop($cards);
        showHand($playersCards);

        echo "The value of your hand is ";

        echo calculateHandValue($playersCards);

        echo "\n \n";

        //deal another card
        
    }

    if ($line === "s"){
        echo "Stand. The value of your hand is ";

        calculateHandValue($playersCards);
        //echo $playerHandValue;
    }




}