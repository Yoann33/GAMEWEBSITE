<?php
function game_verify_existence($gameName)
{
    try
    {
        $db=new PDO('mysql:host=localhost;dbname=GW_DB','root','');
    }
    catch(Exception $e)
    {
        die('Error : '.$e->getMessage());
    }

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