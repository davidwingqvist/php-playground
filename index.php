<!DOCTYPE html>
<html lang="en">
  <head>
    <title>PHP Playground</title>
  </head>
  <body>

    <text>Choose A Move!</text>
    <br/>
    <form action="includes/formhandler.inc.php" method="post">
      <select name="playerMove">
        <option value="Rock">Rock</option>
        <option value="Paper">Paper</option>
        <option value="Scissors">Scissors</option>
      </select>
      <br/>
      <button >Perform</button>
    </form>
    <br/>
  </body>
</html>