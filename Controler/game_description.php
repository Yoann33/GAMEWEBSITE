<?php
require_once 'connect_db.php';
$prepare = $db->prepare("SELECT * FROM games WHERE name=:name");
$prepare->execute(array(
    "name" => $_GET["game_name"]
));
$game = $prepare->fetchAll();
$game = $game[0];
$prepare->closeCursor();

$buttonMessage = "Add to my account";
$path = "/www/GAMEWEBSITE/index.php?controler_file=add_game&game_name=".$_GET["game_name"];

if(isset($_SESSION["user"]))
{
    require_once 'Model/game_verify_existence.php';
    if(game_verify_existence($_GET["game_name"]))
    {
        $buttonMessage = "Game obtained";
        $path = "/www/GAMEWEBSITE/index.php?controler_file=game_description&game_name=".$_GET["game_name"];
    }
}

require_once 'View/game_description.php';