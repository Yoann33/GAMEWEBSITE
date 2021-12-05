<?php
$downloadedGames = [];
foreach($_SESSION["user"]["downloaded_games"] as $downloadedGame)
{
    if($_GET["game_name"] != $downloadedGame)
    {
        array_push($downloadedGames,$downloadedGame);
    }
}

if(count($downloadedGames) == 0)
{
    $downloadedGames = ["none"];
}

$_SESSION["user"]["downloaded_games"] = $downloadedGames;

$downloadedGames = base64_encode(serialize($downloadedGames));

require_once 'connect_db.php';
$update = $db->prepare("UPDATE accounts SET downloaded_games=:downloaded_games WHERE id=:id");
$update->execute(array(
    "id" => $_SESSION["user"]["id"],
    "downloaded_games" => $downloadedGames
));
$update->closeCursor();

require_once 'Controler/my_account.php';