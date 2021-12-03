<?php
/*
session_start();
$_SESSION["user"] = "yoann";
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_games.css">
    <title>GAME DESCRIPTION</title>
</head>
<body>
    <?php require_once("header.php");?>
    <div class="game">
        <h2><?php echo strtoupper(substr($_GET["game_name"],0,1)).substr($_GET["game_name"],1);?></h2>
        <img class="gameCover" src=<?php echo $_GET["game_cover"]?> alt="game cover" height="150px" width="150px"></img>
        <?php

        if(isset($_SESSION["user"]))
        {
            ?>
            <form action="" method="post">
                <button type="submit" value=<?php echo $_GET["game_name"];?>>Add to my account</button>
            </form>
            <?php
        }
        ?>
    </div>
    <div class="description">
        <p><?php echo $_GET["game_description"];?></p>
    </div>
    
</body>
</html>