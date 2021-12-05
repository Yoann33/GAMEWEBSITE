<?php
session_start();
if(!isset($_GET["controler_file"]) || $_GET["controler_file"] == "games")
{
    require_once("Controler/games.php");
}
else if($_GET["controler_file"] == "game_description")
{
    require_once("Controler/game_description.php");
}
else if($_GET["controler_file"] == "sign_up")
{
    require_once("Controler/sign_up.php");
}
else if($_GET["controler_file"] == "sign_in")
{
    require_once("Controler/sign_in.php");
}
else if($_GET["controler_file"] == "sign_out")
{
    require_once("Controler/sign_out.php");
}
else if($_GET["controler_file"] == "my_account")
{
    require_once("Controler/my_account.php");
}
else if($_GET["controler_file"] == "unsuscribe")
{
    require_once("Controler/unsuscribe.php");
}
else if($_GET["controler_file"] == "add_game")
{
    require_once("Controler/add_game.php");
}
else if($_GET["controler_file"] == "remove_game")
{
    require_once("Controler/remove_game.php");
}
else
{
    require_once("Controler/games.php");
}