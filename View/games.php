<?php
/*
session_start();
$_SESSION["user"]="Yoann";
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="View/style_games.css?v=1">
    <title>GAME WEBSITE</title>
</head>
<body>
    <?php require_once("header.php");?>

    <div class="websiteDescription">
        <p>This is a website where you can choose a game to download and open and play it.</p>
    </div>
    <div class="gameSelection">
        <?php
        foreach($gameList as $game)
        {
            $description = $game["description"];
            $description = strtoupper(substr($description,0,1)).substr($description,1);
            $description = urlencode($description);
            ?>
            <div class="gamImg">
                <h2><?php echo $game["name"]?></h2>
                <a href=<?php echo 'View/game_description.php?game_name='.$game["name"].'&game_cover='.$game["img_url"].'&game_description='.$description;?>>
                <img src=<?php echo $game["img_url"]?> alt="game cover" height="150px" width="150px">
                </a> 
            </div>
            <?php
        }
        ?>
    </div>
</body>
</html>