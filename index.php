<?php
session_start();

$filePath = $_SERVER['PHP_SELF'];
$dirPath = dirname($filePath);
require_once 'View/start.php';
if(!isset($_GET["controler_file"]))
{
    require_once("Controler/games.php");
}
else
{
    $controlerFile = $_GET["controler_file"];
    switch($controlerFile)
    {
        case "games":
            require_once("Controler/games.php");
            break;
        case "game_description":
            $gameName = $_GET["game_name"];
            require_once("Controler/game_description.php");
            break;
        case "sign_up":
            require_once("Controler/sign_up.php");
            break;
        case "sign_in":
            require_once("Controler/sign_in.php");
            break;
        case "sign_out":
            require_once("Controler/sign_out.php");
            break;
        case "my_account":
            require_once("Controler/my_account.php");
            break;
        case "unsuscribe":
            require_once("Controler/unsuscribe.php");
            break;
        case "add_game":
            $gameName = $_GET["game_name"];
            require_once("Controler/add_game.php");
            break;
        case "remove_game":
            $gameName = $_GET["game_name"];
            require_once("Controler/remove_game.php");
            break;
        default:
            require_once("Controler/games.php");
    }
}
require_once 'View/end.php';