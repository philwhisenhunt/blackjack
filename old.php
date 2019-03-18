   <?php 

    // echo "The value of your hand is $playerHandValue \n";

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

if($playerHandStatus){//while players turn
    //while handstatus is true AND cards are less than 21
    $line = readline("Type h to hit or s for stand \n");

    if ($line === "h"){
        
        if($playerHandStatus){//no

            $playersCards[] = array_pop($cards);
        }
        echo "Your cards are:\n";
        showHand($playersCards);

        //echo "\nThe value of your hand is ";

       // $playerHandValue = calculateHandValue($playersCards);

        echo $playerHandValue;

        echo "\n \n";

        if($playerHandValue > 21){
            //check for aces. If ace, then try the value minus 10. 

            //split up the cards and remove the suit, to render an array of their value
            for($i=0; $i<count($playersCards); $i++){

                //take each card and turn it into an array (of two letters or numbers)
                $splitHand = str_split($playersCards[$i]); //2H $playerHand[i][0]
                
        
                //get the value or whatever the first card is (without the suit)
                $cardValueArray[] = cardValueMaker($splitHand[0]);
               // print_r($cardValueArray);
                
            }

            //Now that we have the values of the array, check for aces.
            $playerHandValue = aceCheck($cardValueArray);

            /*
            //loop through the array to see if a car is worth 11. If it is, then it may be causing the bust, so deduct 10. 
            for($i=0; $i<count($cardValueArray); $i++){
                // echo 'The variable $cardValueArray[$i] is ' . $cardValueArray[$i] . "\n";
                if($cardValueArray[$i] == 11){
                    //pop the card off the array, so that we can check for more aces.
                    //probably should move this to a function.
                    $playerHandValue -= 10;
                    echo 'The $playerHandValue is ' . $playerHandValue . "\n";

                    if($playerHandValue >21){
                        //check for ace again here
                        //for single deck this would need to be 4 times, but at this point a function is needed.



                        $playerHandStatus = false;
                        echo "You busted, you lose. \n";
                        $bankAccount -= $betAmount;
                        echo "Your current bank account is now at " . $bankAccount . "\n";
                    }


                }

            }

            */
            
            
        } // end if >21

        
       // echo 'The $playerHandValue right after that loop is ' . $playerHandValue . "\n";

    

        
    }

    if ($line === "s"){
        echo "Stand. The value of your hand is ";

        echo calculateHandValue($playersCards);
        echo "\n";
        $playerHandStatus = false;
    
    }

    //player is done end of while
    //dealer action flow start

    //end dealer flow

    //determine winner

    /* Hiding this to debug
    $dealersCards[] = array_pop($cards);
    $dealerHandValue = calculateHandValue($dealersCards);
    echo "Dealer Hand value is " . $dealerHandValue . "\n";
    */

    //moved this out of the way (dealer doesn't get a turn until player is done)
    /*
        //dealer gets a card
        if($dealerHandStatus){//move out of players action flow
            $dealersCards[] = array_pop($cards);
        }
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