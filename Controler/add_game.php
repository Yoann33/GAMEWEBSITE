<?php
require_once 'connect_db.php';

if($_SESSION["user"]["downloaded_games"][0] == "none")
{
    $_SESSION["user"]["downloaded_games"][0] = $_GET["game_name"];
}
else
{
    array_push($_SESSION["user"]["downloaded_games"],$_GET["game_name"]);
}

$downloadedGames = $_SESSION["user"]["downloaded_games"];

$downloadedGames = base64_encode(serialize($downloadedGames));

$prepare = $db->prepare("UPDATE accounts SET downloaded_games=:downloaded_games WHERE id=:id");
$prepare->bindParam(':downloaded_games',$downloadedGames,PDO::PARAM_STR);
$prepare->bindParam(':id',$_SESSION["user"]["id"],PDO::PARAM_INT);
$prepare->execute();
$prepare->closeCursor();

require_once 'Controler/game_description.php';