<?php
function game_verify_existence($gameName)
{
    $downloadedGames = $_SESSION["user"]["downloaded_games"];
    foreach($downloadedGames as $downloadedGame)
    {
        if($gameName == $downloadedGame)
        {
            return true;
        }
    }
    return false;
}