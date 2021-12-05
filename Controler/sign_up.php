<?php
$errorMessage = null;
if(isset($_POST["email"],$_POST["pseudo"],$_POST["password"],$_POST["confirm"]))
{
    if($_POST["email"] == null || $_POST["pseudo"] == null || $_POST["password"] == null || $_POST["confirm"]== null)
    {
        $errorMessage = "Formular not filled correctly.<br/>Try again.";
    }
    else
    {
        if($_POST["password"] != $_POST["confirm"])
        {
            $errorMessage ="Wrong password confirmation.<br/>Be carefull they must be the same.";
        }
        else
        {
            $email = strip_tags($_POST["email"]);
            $pseudo = strip_tags($_POST["pseudo"]);
            $password = strip_tags($_POST["password"]);
            $role = "user";
            $downloadedGames = base64_encode(serialize(["none"]));

            require_once 'Model/user_verification_existence.php';

            if(user_verification_existence($password))
            {
                $errorMessage = "Sorry this password is already taken.<br/>Try an other one.";
            }
            else
            {
                $password = password_hash($password,PASSWORD_ARGON2ID);
                
                require_once 'connect_db.php';
                
                $prepare = $db->prepare("INSERT INTO accounts (pseudo, email, password, role, downloaded_games) VALUES(:pseudo, :email, :password, :role, :downloaded_games)");
                $prepare->execute(array(
                    "pseudo" => $pseudo,
                    "email" => $email,
                    "password" => $password,
                    "role" => $role,
                    "downloaded_games" => $downloadedGames
                ));
                $prepare->closeCursor();
                
                $_SESSION["user"] = [
                    "id" => $db->lastInsertId(),
                    "pseudo" => $pseudo,
                    "email" => $email,
                    "role" => $role,
                    "downloaded_games" => unserialize(base64_decode($downloadedGames))
                ];
                $_GET["controler_file"] = "games";
                require_once 'games.php';
            }
        }
    }
}
else
{
    require_once 'View/sign_up.php';
}