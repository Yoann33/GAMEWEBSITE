<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="View/style_games.css">
    <title>GAME DESCRIPTION</title>
</head>
<body>
    <?php include 'header.php';?>
    <div class="game">
        <h2><?php echo strtoupper(substr($_GET["game_name"],0,1)).substr($_GET["game_name"],1);?></h2>
        <img class="gameCover" src=<?php echo $game["img_url"]?> alt="game cover" height="200px" width="200px"></img>
        <?php
        if(isset($_SESSION["user"]))
        {
            $class = "open";
            if($buttonMessage == "Game obtained")
            {
                $class = "close";
            }
            ?>
                <div class="options">
                    <a class=<?php echo $class;?> href=<?php echo $path;?>><?php echo $buttonMessage;?></a>
                </div>
            <?php
        }
        ?>
        <div class="description">
            <p><?php echo $game["description"];?></p>
        </div>
    </div>    
</body>
</html>