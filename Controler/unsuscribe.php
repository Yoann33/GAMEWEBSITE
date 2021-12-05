<?php

if(isset($_GET["answere"]))
{
    if($_GET["answere"] == "no")
    {
        header("Location: /www/GAMEWEBSITE/index.php.?controler_file=".$_GET["current_file"]);
    }
    else
    {
        require_once 'connect_db.php';
        $delete = $db->prepare("DELETE FROM accounts WHERE id=:id");
        $delete->execute(array(
            "id" => $_SESSION["user"]["id"]
        ));
        $delete->closeCursor();

        require_once 'sign_out.php';
    }
}
else
{
    require_once 'Controler/'.$_GET["current_file"].".php";
    require_once 'View/popup.php';
}