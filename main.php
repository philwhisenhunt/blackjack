<?php
require 'showHand.php';
require "calculateHandValue.php";
$dealerHandValue = 0;
$playerHandValue = 0;
$playersCards = [];
$dealersCards = [];

//$cards = ['AH','JC', 'KH', '9C', 'JH' ];
//blank cards $cards = ['A','K','Q','J','T', '9', '8', '7', '6', '5', '4', '3', '2'];

$cards = ['AH','KH','QH','JH','TH', '9H', '8H', '7H', '6H', '5H', '4H', '3H', '2H'];


$playersCards[] = array_pop($cards);
$playersCards[] = array_pop($cards);
showHand($playersCards);

while ($dealerHandValue < 17) {
    //echo "Bet or stay?";
    $line = readline("Type h to hit or s for stand \n");

    if ($line === "h"){
        
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

    //dealer gets a card

    $dealersCards[] = array_pop($cards);
    $dealerHandValue = calculateHandValue($dealersCards);
    echo "Dealer Hand value is " . $dealerHandValue . "\n";




}