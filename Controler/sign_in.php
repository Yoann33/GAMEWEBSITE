<?php
$errorMessage = null;
if(isset($_POST["email"],$_POST["password"]))
{
    if($_POST["email"] == null || $_POST["password"] == null)
    {
        $errorMessage = "Invalid password or email.<br/>Try again.";
        require_once 'View/sign_in.php';
    }
    else
    {
        $email = strip_tags($_POST["email"]);
        $password = strip_tags($_POST["password"]);

        require_once 'connect_db.php';
        $query = $db->query("SELECT * FROM accounts");
        $accounts = $query->fetchAll();
        $query->closeCursor();

        foreach($accounts as $account)
        {
            if(password_verify($password,$account["password"]) && $email == $account["email"])
            {
                $query = $db->prepare("SELECT * FROM favorites WHERE user_id=:user_id");
                $query->execute(array(
                    "user_id" => $account["id"]
                ));
                $gamesIds = $query->fetchAll();
                $query->closeCursor();

                $downloadedGames = [];

                if($gamesIds != null)
                {
                    foreach($gamesIds as $gameId)
                    {
                        $gameId = $gameId["game_id"];
                        $query = $db->prepare("SELECT * FROM games WHERE id=:game_id");
                        $query->execute(array(
                            "game_id" => $gameId
                        ));
                        $game = $query->fetchAll();
                        array_push($downloadedGames,$game[0]["name"]);
                    }
                    $query->closeCursor();
                }

                $_SESSION["user"] = [
                    "id" => $account["id"],
                    "pseudo" => $account["pseudo"],
                    "email" => $account["email"],
                    "password" => $account["password"],
                    "role" => $account["role"],
                    "downloaded_games" => $downloadedGames
                ];
                $controlerFile = "games";
                require_once 'games.php';
            }
        }
        if(!isset($_SESSION["user"])){
            $errorMessage = "Invalid password or email.<br/>Try again.";
            require_once 'View/sign_in.php';
        }
    }
}
else
{
    require_once 'View/sign_in.php';
}