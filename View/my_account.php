<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="View/style_games.css">
    <title>My account</title>
</head>
<body>
    <?php include 'header.php';?>
    <div class="infos">
        <h3><?php echo strtoupper(substr($_SESSION["user"]["role"],0,1)).substr($_SESSION["user"]["role"],1).": ".$_SESSION["user"]["pseudo"]."<br/>Email: ".$_SESSION["user"]["email"]."<hr>"?></h3>
    </div>
    <?php
    $downloadedGames = $_SESSION["user"]["downloaded_games"];

    if($downloadedGames[0] != "none")
    {
        foreach($downloadedGames as $key => $downloadedGame)
        {
            ?>
            <div class="game">
                <h2><?php echo strtoupper(substr($downloadedGame,0,1)).substr($downloadedGame,1);?></h2>
                <img class="gameImg" src=<?php echo "/www/GAMEWEBSITE/Games/".$downloadedGame."/img.png";?>></img>
                <div class="options">
                    <a class="open" href=<?php echo "/www/GAMEWEBSITE/Games/".$downloadedGame."/";?>>Open</a>
                    <a class="remove" href=<?php echo "/www/GAMEWEBSITE/index.php?controler_file=remove_game&game_name=".$downloadedGame;?>>Remove</a>
                </div>
                <div class="description">
                    <p>
                        <?php
                        foreach($games as $game)
                        {
                            if($game["name"] == $downloadedGame)
                            {
                                echo $game["description"];
                            }
                        }
                        ?>
                    </p>
                </div>
            </div>
            <?php
        }
    }
    ?>
</body>
</html>