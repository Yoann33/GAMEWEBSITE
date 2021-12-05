<?php
$errorMessage = null;
if(isset($_POST["email"],$_POST["password"]))
{
    if($_POST["email"] == null || $_POST["password"] == null)
    {
        $errorMessage = "Invalid password or email.<br/>Try again.";
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
            if(password_verify($password,$account["password"]))
            {
                $_SESSION["user"] = [
                    "id" => $account["id"],
                    "pseudo" => $account["pseudo"],
                    "email" => $account["email"],
                    "password" => $account["password"],
                    "role" => $account["role"],
                    "downloaded_games" => unserialize(base64_decode($account["downloaded_games"]))
                ];
                require_once 'games.php';
            }
        }
        $errorMessage = "This account doesn't exist.<br/>Try again or create it by signing up";
    }
    require_once 'View/sign_in.php';
}
else
{
    require_once 'View/sign_in.php';
}