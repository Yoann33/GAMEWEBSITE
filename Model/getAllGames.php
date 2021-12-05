<?php
function getAllGames()
{
    global $db;
    $query = $db->query("SELECT * FROM games");
    $gameList = $query->fetchAll();
    $query->closeCursor();
    return $gameList;
}