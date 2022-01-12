<?php
require_once 'connect_db.php';

$prepare = $db->prepare("SELECT * FROM games WHERE name=:name");
$prepare->execute(array(
    "name" => $gameName
));
$game = $prepare->fetchAll();
$game = $game[0];
$prepare->closeCursor();

if(isset($_SESSION["user"]))
{
    $buttonMessage = "Add to my account";
    $path = $filePath."?controler_file=add_game&game_name=".$gameName;
    require_once 'Model/game_verify_existence.php';

    if(game_verify_existence($gameName))
    {
        $buttonMessage = "Game obtained";
        $path = $filePath."?controler_file=my_account";
    }
}

require_once 'View/game_description.php';