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
        <h3><?php echo strtoupper(substr($userRole,0,1)).substr($userRole,1).": ".$userPseudo."<br/>Email: ".$userEmail."<hr>"?></h3>
    </div>
    <?php
    if(count($userDownloadedGames) != 0)
    {
        foreach($userDownloadedGames as $downloadedGame)
        {
            ?>
            <div class="game">
                <div>
                    <h2><?php echo strtoupper(substr($downloadedGame,0,1)).substr($downloadedGame,1);?></h2>
                    <img class="gameImg" src=<?php echo $dirPath."/Games/".$downloadedGame."/img.png";?>></img>
                    <div class="options">
                        <a class="open" href=<?php echo $dirPath."/Games/".$downloadedGame."/";?>>Open</a>
                        <a class="remove" href=<?php echo $filePath."?controler_file=remove_game&game_name=".$downloadedGame;?>>Remove</a>
                    </div>
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