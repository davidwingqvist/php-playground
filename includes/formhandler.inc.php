<?php
require("./opponentHandler.php");

if($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $playerHand = $_POST["playerMove"];

    $opponent->DrawHand();
    $result = $opponent->Check($playerHand);

    echo $result;
}
else
{
    header("Location: ../index.php");
}