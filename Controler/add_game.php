<?php
require_once 'connect_db.php';

$user = $_SESSION["user"];
$userId = $user["id"];
$userSetOfGames = $user["downloaded_games"];

//Selection of game id of witch must be added
$query = $db->prepare("SELECT * FROM games WHERE name=:name");
$query->execute(array(
    "name" => $gameName
));
$gameId = $query->fetchAll();
$gameId = $gameId[0]["id"];
$query->closeCursor();

//Insertion of the new favorite
$insert = $db->prepare("INSERT INTO favorites (user_id,game_id) VALUES(:user_id,:game_id)");
$insert->execute(array(
    "user_id" => $userId,
    "game_id" => $gameId
));

//Updating the session list of downoloaded games
array_push($userSetOfGames,$gameName);
$_SESSION["user"]["downloaded_games"] = $userSetOfGames;

require_once 'Controler/game_description.php';