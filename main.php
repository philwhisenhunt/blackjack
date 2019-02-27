<?php
require 'showHand.php';
require "calculateHandValue.php";
$dealerHandValue = 0;
$playerHandValue = 0;
$playersCards = [];
$dealersCards = [];

//$cards = ['AH','JC', 'KH', '9C', 'JH' ];
//blank cards $cards = ['A','K','Q','J','T', '9', '8', '7', '6', '5', '4', '3', '2'];

$cards = ['AH','KH','QH','JH','TH', '9H', '8H', '7H', '6H', '5H', '4H', '3H', '2H',
 'AS','KS','QS','JS','TS', '9S', '8S', '7S', '6S', '5S', '4S', '3S', '2S',
 'AD','KD','QD','JD','TD', '9D', '8D', '7D', '6D', '5D', '4D', '3D', '2D', 
 'AC','KC','QC','JC','TC', '9C', '8C', '7C', '6C', '5C', '4C', '3C', '2C'];


$playersCards[] = array_pop($cards);
$playersCards[] = array_pop($cards);
showHand($playersCards);

while ($dealerHandValue < 17 && $playerHandValue <22) {
    //echo "Bet or stay?";
    $line = readline("Type h to hit or s for stand \n");

    if ($line === "h"){
        
        $playersCards[] = array_pop($cards);
        showHand($playersCards);

        echo "The value of your hand is ";

        echo calculateHandValue($playersCards);

        echo "\n \n";

        //dealer gets a card
        $dealersCards[] = array_pop($cards);

        
    }

    if ($line === "s"){
        echo "Stand. The value of your hand is ";

        echo calculateHandValue($playersCards);
        echo "\n \n";

        //set player status to false?

     
    }


    $dealersCards[] = array_pop($cards);
    $dealerHandValue = calculateHandValue($dealersCards);
    echo "Dealer Hand value is " . $dealerHandValue . "\n";

    




}

$dealerHandValue = calculateHandValue($dealersCards);

if($dealerHandValue < 22 && $dealerHandValue > 16){
    if($dealerHandValue == 21){
        echo "Dealer wins";
    }

    else{
        echo "dealer stands with a value of ";
        calculateHandValue($dealersCards);
    }

    
}

if($dealerHandValue > 22){
    echo "Dealer busts with a value of $dealerHandValue \n";
  
}