<!DOCTYPE html>
<html lang="en">
  <head>
    <title>PHP Playground</title>
  </head>
  <body>

    <text>Choose A Move!</text>
    <br/>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"
      method="post">
      <select name="playerMove">
        <option value="Rock">Rock</option>
        <option value="Paper">Paper</option>
        <option value="Scissors">Scissors</option>
      </select>
      <br/>
      <button >Perform</button>
    </form>
    <br/>

    <?php
    
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
      // Initialization of variables, clean.
      $opponentHand = "empty";
      $playerHand = htmlspecialchars($_POST["playerMove"]);

      // Choose hand for opponent.
      function DrawRandom(&$hand)
      {
          $randomNumber = rand(1, 3);

          switch($randomNumber)
          {
              case 1:
                  $hand = "Rock";
                  break;
              case 2:
                  $hand = "Paper";
                  break;
              case 3:
                  $hand = "Scissors";
                 break;
         }
     }

      DrawRandom($opponentHand);

      // Game being drawn.
      echo "Your move: " . $playerHand;
      echo "<br>";
      echo "Opponent move: " . $opponentHand;
      echo "<br>";

      // Win conditions check
      if($opponentHand === $playerHand)
      {
        echo "IT'S A TIE!";
      }
      else if($opponentHand === "Rock" && $playerHand !== "Paper")
      {
        echo "OPPONENT WON!";
      }
      else if($opponentHand === "Paper" && $playerHand !== "Scissors")
      {
        echo "OPPONENT WON!";
      }
      else if($opponentHand === "Scissors" && $playerHand !== "Rock")
      {
        echo "OPPONENT WON!";
      }
      else
      {
        echo "PLAYER WON!";
      }
    }


    ?>
  </body>
</html>