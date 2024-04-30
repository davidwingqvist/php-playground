<?php

class Opponent {
    private $move = "empty";

    public function DrawHand()
    {
        $randomNumber = rand(1, 3);

        switch($randomNumber)
        {
            case 1:
                $this->move = "Rock";
                break;
            case 2:
                $this->move = "Paper";
                break;
            case 3:
                $this->move = "Scissors";
               break;
       }
    }

    public function GetHand()
    {
        return $this->move;
    }

    // 1 - Player won, 2 - Opponent won, 3 - Tie
    public function Check(&$playerHand)
    {
      // Win conditions check
      if($this->move === $playerHand)
      {
        return 3;
      }
      else if($this->move=== "Rock" && $playerHand !== "Paper")
      {
        return 2;
      }
      else if($this->move === "Paper" && $playerHand !== "Scissors")
      {
        return 2;
      }
      else if($this->move === "Scissors" && $playerHand !== "Rock")
      {
        return 2;
      }
      else
      {
        return 1;
      }
    }
};

$opponent = new Opponent();
