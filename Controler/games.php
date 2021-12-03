<?php
require_once("Model/connect_db.php");
require_once("Model/getAllGames.php");
$gameList = getAllGames();
require_once("View/games.php");
?>