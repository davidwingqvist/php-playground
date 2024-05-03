<?php
require("./opponentHandler.php");

// Make sure the user arrived through "POST" function.
if($_SERVER["REQUEST_METHOD"] == "POST") 
{
    // Read player move, decide opponent move.
    $playerHand = $_POST["playerMove"];
    $opponent->DrawHand();
    $opponentHand = $opponent->GetHand();

    $result = $opponent->Check($playerHand);

    try {
        require_once "dbh.inc.php";

        // Create query for Database
        $query = "INSERT INTO games (playerMove, opponentMove) VALUES 
        (?, ?);";

        // Sanitize the input
        $stmt = $pdo->prepare($query);
        $stmt->execute([$playerHand, $opponentHand]);

        // Safety exits.
        $pdo = null;
        $stmt = null;

        header("Location: ../index.php");

        die();
    }
    catch(PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }


}
else
{
    header("Location: ../index.php");
}