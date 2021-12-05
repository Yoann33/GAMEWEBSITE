<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="View/style_games.css">
    <title>GAME WEBSITE</title>
</head>
<body>
    <?php include 'header.php';?>

    <div class="websiteDescription">
        <p>This is a website where you can choose a game. You can download and open and play.</p>
        <p>To get the permission to download and play a game you have to create an account by signing up or to connect to yours by signing in.</p>
        <p>When it is done, you can click on a game image to get a game description and add the game to your account.</p>
        <p>Don't forget to sign out when you are done. The next time you visit this website you can sign in.</p>
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
                <h2><?php echo strtoupper(substr($game["name"],0,1)).substr($game["name"],1);?></h2>
                <a href=<?php echo '/www/GAMEWEBSITE/index.php?controler_file=game_description&game_name='.$game["name"];?>>
                <img src=<?php echo $game["img_url"]?> alt="game cover" height="200px" width="200px">
                </a> 
            </div>
            <?php
        }
        ?>
    </div>
</body>
</html>