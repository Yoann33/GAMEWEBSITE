<?php
$errorMessage = null;
if(isset($_POST["email"],$_POST["pseudo"],$_POST["password"],$_POST["confirm"]))
{
    if($_POST["email"] == null || $_POST["pseudo"] == null || $_POST["password"] == null || $_POST["confirm"]== null)
    {
        $errorMessage = "Formular not filled correctly.<br/>Try again.";
        require_once 'View/sign_up.php';
    }
    else
    {
        if($_POST["password"] != $_POST["confirm"])
        {
            $errorMessage ="Wrong password confirmation.<br/>Be carefull they must be the same.";
            require_once 'View/sign_up.php';
        }
        else
        {
            $email = strip_tags($_POST["email"]);
            $pseudo = strip_tags($_POST["pseudo"]);
            $password = strip_tags($_POST["password"]);
            $role = "user";

            require_once 'connect_db.php';
            require_once 'Model/user_verification_existence.php';

            if(user_verification_existence($password,$email))
            {
                $errorMessage = "You already have this account.";
            }
            else
            {
                $password = password_hash($password,PASSWORD_ARGON2ID);

                $prepare = $db->prepare("INSERT INTO accounts (pseudo, email, password, role) VALUES(:pseudo, :email, :password, :role)");
                $prepare->execute(array(
                    "pseudo" => $pseudo,
                    "email" => $email,
                    "password" => $password,
                    "role" => $role
                ));
                $prepare->closeCursor();
                
                $_SESSION["user"] = [
                    "id" => $db->lastInsertId(),
                    "pseudo" => $pseudo,
                    "email" => $email,
                    "role" => $role,
                    "downloaded_games" => []
                ];
                $controlerFile = "games";
                require_once 'games.php';
            }
        }
    }
}
else
{
    require_once 'View/sign_up.php';
}