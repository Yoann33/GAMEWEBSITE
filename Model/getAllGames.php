<?php
function getAllGames()
{
    global $db;
    $query = $db->query("SELECT * FROM games");
    $gameList = $query->fetchAll();
    return $gameList;
}