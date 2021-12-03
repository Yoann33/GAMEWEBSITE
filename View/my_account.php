<?php
session_start();
$_SESSION["user"]=[
    "pseudo" => "Y",
    "email" => "a.b@gmail.com",
    "password" => "psswrd",
    "role" => "user",
    //"downloaded_games" => json_decode($user["url_games"])
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_games.css">
    <title>My account</title>
</head>
<body>
    <?php require_once("header.php");?>
    <div class="infos">
        <h3><?php echo $_SESSION["user"]["pseudo"]."<br/>".$_SESSION["user"]["email"]."<hr>"?></h3>
    </div>
    <div class="game">
        <h2><?php echo strtoupper(substr("tekken",0,1)).substr("tekken",1);?></h2>
        <img class="gameImg" src="https://via.placeholder.com/150"></img>
        <?php
        if(isset($_SESSION["user"]))
        {
            ?>
            <form action="" method="post">
                <button type="submit" value=<?php echo "tekken";?>>open</button>
            </form>
            <?php
        }
        ?>
    </div>
    <div class="description">
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dicta id maiores voluptates autem, culpa quis rem voluptate nulla alias ipsam minima doloribus reprehenderit dolores fugit temporibus perspiciatis tenetur similique omnis repellendus sed vel. Iure iste quod perspiciatis libero error, laboriosam sint blanditiis quo, saepe nesciunt nulla recusandae, deleniti sed ab!</p>
    </div>
</body>
</html>