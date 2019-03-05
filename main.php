<?php
require 'showHand.php';
require "calculateHandValue.php";
require 'showDealerHalfHand.php';
$dealerHandValue = 0;
$playerHandValue = 0;
$playersCards = [];
$dealersCards = [];
$playerHandStatus = true;
$dealerHandStatus = true;
$bankAccount = 500;
$betAmount = 50;
$wantToPlay = true;


//blank cards $cards = ['A','K','Q','J','T', '9', '8', '7', '6', '5', '4', '3', '2'];

$cards = ['AH','KH','QH','JH','TH', '9H', '8H', '7H', '6H', '5H', '4H', '3H', '2H',
 'AS','KS','QS','JS','TS', '9S', '8S', '7S', '6S', '5S', '4S', '3S', '2S',
 'AD','KD','QD','JD','TD', '9D', '8D', '7D', '6D', '5D', '4D', '3D', '2D', 
 'AC','KC','QC','JC','TC', '9C', '8C', '7C', '6C', '5C', '4C', '3C', '2C'];

 echo "Shuffling cards ... \n";
 shuffle($cards);


while ($wantToPlay) {

    $playersCards[] = array_pop($cards);
    $playersCards[] = array_pop($cards);
    $dealersCards[] = array_pop($cards);
    $dealersCards[] = array_pop($cards);

    echo "Your cards are:\n";
    showHand($playersCards);

    $playerHandValue = calculateHandValue($playersCards);
    $dealerHandValue = calculateHandValue($dealersCards);

    if($playerHandValue == 21 && $dealerHandValue == 21){
        echo "It was a tie";
        //die();
    }
    if($playerHandValue == 21){
        echo "You win with Blackjack!";
        $bankAccount += $betAmount;
        echo "Your current bank account is now at " . $bankAccount . "\n";
        $playerHandStatus = false;
        $dealerHandStatus = false;
    }

    echo "The value of your hand is $playerHandValue \n";

    echo "The dealer has: ";
    showDealerHalfHand($dealersCards);
    

    $playerHandValue = calculateHandValue($playersCards);
    $dealerHandValue = calculateHandValue($dealersCards);

    if($playerHandValue == 21 && $dealerHandValue == 21){
        echo "It was a tie";
        
    }
    if($playerHandValue == 21){
        echo "Blackjack!";
        
    }

    if($playerHandStatus){
        //while handstatus is true AND cards are less than 21
        $line = readline("Type h to hit or s for stand \n");
  
        if ($line === "h"){
            
            if($playerHandStatus){

                $playersCards[] = array_pop($cards);
            }
            echo "Your cards are:\n";
            showHand($playersCards);

            echo "\nThe value of your hand is ";

            $playerHandValue = calculateHandValue($playersCards);

            echo $playerHandValue;

            echo "\n \n";

            if($playerHandValue > 21){
                $playerHandStatus = false;
                echo "You busted, you lose. \n";
                $bankAccount -= $betAmount;
                echo "Your current bank account is now at " . $bankAccount . "\n";
                
            }

            //dealer gets a card
            if($dealerHandStatus){
                $dealersCards[] = array_pop($cards);
            }

            
        }

        if ($line === "s"){
            echo "Stand. The value of your hand is ";

            echo calculateHandValue($playersCards);
            echo "\n";
            $playerHandStatus = false;
        
        }


        /* Hiding this to debug
        $dealersCards[] = array_pop($cards);
        $dealerHandValue = calculateHandValue($dealersCards);
        echo "Dealer Hand value is " . $dealerHandValue . "\n";
        */

        if ($dealerHandValue > 21){
            $dealerHandStatus = false;
            $playerHandStatus = false;
        }

        if($dealerHandValue >=17 ){
            $dealerHandStatus = false;
        }



        $dealerHandValue = calculateHandValue($dealersCards);

        if($dealerHandValue < 22 && $dealerHandValue > 16){
            if($dealerHandValue == 21){
                echo "Dealer wins \n";
                $bankAccount -= $betAmount;
            }

            if($dealerHandValue < 17){
            
                $dealersCards[] = array_pop($cards);
                
            }
        
            else{
                $dealerHandStatus = false;
                echo "dealer stands with a value of ";
                echo calculateHandValue($dealersCards);
                echo "\n";
            }
        
            
        }
        
        if($dealerHandValue > 22){
            $dealerHandStatus = false;
            echo "Dealer busts with a value of $dealerHandValue \n";
            echo "You win! \n";
            $bankAccount += $betAmount;
            echo "Your current bank account is now at " . $bankAccount . "\n";
            
        }
        
        if($dealerHandValue < $playerHandValue){
            
        }

    }

    $wantToPlay = false;
    $promptReplay = readline("Want to play again? (Y or N)\n");
    if($promptReplay == "y" || $promptReplay == "Y"){
        $wantToPlay = true;
        $playersCards = [];
        $dealersCards =[];
        $playerHandStatus = true;
        $dealerHandStatus = true;
    }

    else{
        exit();
    }

}


