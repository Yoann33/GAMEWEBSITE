<?php
require_once 'connect_db.php';

$query = $db->query("SELECT * FROM games");
$games = $query->fetchAll();
$query->closeCursor();

$user = $_SESSION["user"];
$userRole = $user["role"];
$userPseudo = $user["pseudo"];
$userEmail = $user["email"];
$userDownloadedGames = $user["downloaded_games"];

require_once 'View/my_account.php';