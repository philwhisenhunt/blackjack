<?php
require 'showHand.php';
require "calculateHandValue.php";
require 'showDealerHalfHand.php';
require 'cardValueMaker.php';
require 'aceCheck.php';

$dealerHandValue = 0;
$playerHandValue = 0;
$playersCards = [];
$dealersCards = [];
$playerHandStatus = true;
$dealerHandStatus = true;
$bankAccount = 500;
$betAmount = 50;
$wantToPlay = true;
$playerBust = false;


//blank cards $cards = ['A','K','Q','J','T', '9', '8', '7', '6', '5', '4', '3', '2'];

//this could be done with a set of 13 cards, combined with another array of 4 suits
$cards = ['AH','KH','QH','JH','TH', '9H', '8H', '7H', '6H', '5H', '4H', '3H', '2H',
 'AS','KS','QS','JS','TS', '9S', '8S', '7S', '6S', '5S', '4S', '3S', '2S',
 'AD','KD','QD','JD','TD', '9D', '8D', '7D', '6D', '5D', '4D', '3D', '2D', 
 'AC','KC','QC','JC','TC', '9C', '8C', '7C', '6C', '5C', '4C', '3C', '2C'];

 echo "Shuffling cards ... \n";
 //for use testing
 //$cards = ['AH', 'AC', 'AH', 'AC', 'AH', 'AC'];//resume here and make 22 default
 shuffle($cards);
  
while ($wantToPlay) {

    //give the player cards
    $playersCards[] = array_pop($cards);
    $playersCards[] = array_pop($cards);

    //give the dealer cards
    $dealersCards[] = array_pop($cards);
    $dealersCards[] = array_pop($cards);

    // for testing  
    //$playersCards = ['TC', '6C'];
    //$playersCards = ['AH', 'AD'];  
    // $dealersCards = ['AS', '2H'];  


    while($playerHandStatus){

        $betAmount = 50;

        echo "Your cards are:\n";
        showHand($playersCards);

        $playerHandValue = calculateHandValue($playersCards);

        echo 'Your hand has a value of ';
        echo $playerHandValue . "\n";
       

    

        //check most complex thing first

        //check for aces. If ace, then try the value minus 10. 
        if($playerHandValue > 21){
             $cardValueArray = [];
            //get the value or whatever the first card is (without the suit)
          
            //loop through and split up the cards and remove the suit, to render an array of their value
            for($i=0; $i<count($playersCards); $i++){

                //take each card and turn it into an array (of two letters or numbers)
                $splitHand = str_split($playersCards[$i]); //2H $playerHand[i][0]
                
                $cardValueArray[] = cardValueMaker($splitHand[0]);
                // echo "Print the cardValueArray after: ";
                // print_r($cardValueArray);

            }   
          
            //check if there are aces in card value array
            $playerHandValue = aceCheck($cardValueArray);
            echo "The value of your hand is: " . $playerHandValue . "\n";
            // echo 'This should say 12: ' . $playerHandValue . "\n";
            

            if($playerHandValue > 21){
                $playerHandStatus = false;
            }
            
    }
/////////
    //if it is still over 21, then stop
    if($playerHandValue > 21){
            $playerHandStatus = false;
            $dealerHandStatus = false;
            // echo "You busted, you lose. \n";
            // $bankAccount -= $betAmount;
            // echo "Your current bank account is now at " . $bankAccount . "\n";

            // echo "Your cards were: ";
            // showHand($playersCards);
            // $playerBust = true;
    }

    if($playerHandValue == 21 && $dealerHandValue == 21){
            echo "It was a tie";
            //die();
            $playerHandStatus = false;
            $dealerHandStatus = false;
        }

        elseif($dealerHandValue == 21){
            // echo "Dealer wins. ";
            // $bankAccount -= $betAmount;
            // echo "Your current bank account is now at " . $bankAccount . "\n";
            $playerHandStatus = false;
            $dealerHandStatus = false;
        }

    elseif($playerHandValue == 21 && count($playersCards) < 3){
            echo "You win with Blackjack! \n";
            $bankAccount += $betAmount;
            echo "Your current bank account is now at " . $bankAccount . "\n";
            $playerHandStatus = false;
            $dealerHandStatus = false;
        }


        elseif($playerHandValue < 21){

            //while players turn
            if($playerHandStatus){
                
                $line = readline("Type h to hit or s for stand \n");
            
                if ($line === "h"){
                    
                    $playersCards[] = array_pop($cards);
                }

                //add if stand
                if ($line === "s"){
                    echo "Stand. The value of your hand is ";
                    echo ($playerHandValue);
                    //aceCheck($playerHandValue);
                    //echo calculateHandValue($playersCards);
                    echo "\n";
                    $playerHandStatus = false;
                
                }
            }



        }
    }//end of while player status being true

    
    echo 'The dealer\'s cards are: ';
    showHand($dealersCards);
    $dealerHandValue = calculateHandValue($dealersCards);

    while($dealerHandStatus && $playerBust !== true){

        echo "The dealer's cards are: \n";
        showHand($dealersCards);
        $dealerHandValue = calculateHandValue($dealersCards);

        echo 'Dealer has a value of ' . $dealerHandValue . "\n";

        if($dealerHandValue > 21){
            echo 'Dealer busted' . "\n";
            $dealerHandStatus = false;
        }

        if($dealerHandValue == 21){
            echo 'Dealer has 21' . "\n";
            $dealerHandStatus = false;
        }

        if($dealerHandValue <= 21 && $dealerHandValue > 16){
            echo 'Dealer stands'. "\n";
            $dealerHandStatus = false;
        }

        else{
            echo 'Dealer hits' . "\n";
            $dealersCards[] = array_pop($cards);
        }

    } //end while dealer's status true

    //check who won
    if($dealerHandValue > 21){
        echo 'You win because the dealer busted. ' . "\n";
        $bankAccount += $betAmount;
        echo "You now have ". $bankAccount . " in the bank\n";
    }
/////////
    elseif($playerHandValue > 21){
        echo 'You lose because you busted' . "\n";
        $bankAccount -= $betAmount;
        echo "You now have ". $bankAccount . " in the bank\n";
    }

    elseif($dealerHandValue == $playerHandValue){
        echo 'Tie! No money changed hands' . "\n";
    }

    elseif($dealerHandValue > $playerHandValue){
        echo 'Dealer wins' . "\n";
        $bankAccount -= $betAmount;
        echo "You now have ". $bankAccount . " in the bank\n";

    }

    elseif($dealerHandValue < $playerHandValue && $dealerHandStatus == false){
        echo 'You win!' . "\n";
        $bankAccount += $betAmount;
        echo "You now have ". $bankAccount . " in the bank\n";

    }

    else{
        "How did we get here? --- Contact developer \n";
    }


    //reset to false so that the game won't run forever
    $wantToPlay = false;
    $promptReplay = readline("Want to play again? (y or n)\n");
    
    //but give them a chance to keep playing
    if($promptReplay == "y" || $promptReplay == "Y"){
        $wantToPlay = true;
        $playersCards = [];
        $dealersCards =[];
        $playerHandStatus = true;
        $dealerHandStatus = true;
  
    }

    //if not, then quit the program
    else{
        exit();   
    }


}


