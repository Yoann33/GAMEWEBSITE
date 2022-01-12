<?php
$user = $_SESSION["user"];
$newSetOfGames = [];
$userDownloadedGames = $user["downloaded_games"];
foreach($userDownloadedGames as $downloadedGame)
{
    if($gameName != $downloadedGame)
    {
        array_push($newSetOfGames,$downloadedGame);
    }
}

$_SESSION["user"]["downloaded_games"] = $newSetOfGames;

require_once 'connect_db.php';

$query = $db->prepare("SELECT * FROM games WHERE name=:name");
$query->execute(array(
    "name" => $gameName
));
$gameId = $query->fetchAll();
$gameId = $gameId[0]["id"];
$query->closeCursor();

$delete = $db->prepare("DELETE FROM favorites WHERE game_id=:game_id");
$delete->execute(array(
    "game_id" => $gameId
));
$delete->closeCursor();

require_once 'Controler/my_account.php';