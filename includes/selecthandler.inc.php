<?php

// Make sure the user arrived through "POST" function.
if($_SERVER["REQUEST_METHOD"] == "POST") 
{
    try {
        require_once "dbh.inc.php";

        // Create query for Database
        $query = "SELECT * from games";

        $result = $pdo->query($query);

        if($result->rowCount() > 0) 
        {
            while($row = $result->fetch(PDO::FETCH_ASSOC))
            {
                echo "id: " . $row["gameID"] . " - Player: " . $row["playerMove"] . " - Opponent: " . $row["opponentMove"] . "<br>";
            }
        }
        else
        {
            echo "Nothing found...";
        }

        // Safety exits.
        $pdo = null;
        $result = null;

    }
    catch(PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}
else
{
    header("Location: ../index.php");
}