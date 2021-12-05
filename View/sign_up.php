<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="View/style_games.css">
    <title>Sign up</title>
</head>
<body>
    <header><h1><a href="/www/GAMEWEBSITE/index.php?contoler_files=games">GAMEWEBSITE</a></h1></header>
    <form action="/www/GAMEWEBSITE/index.php?controler_file=sign_up" method="post" class="formular">
        <label for="email">Your email</label>
        <input type="email" name="email" id="email" placeholder="an.example@email.com">
        <label for="password">Choose pseudo</label>
        <input type="text" name="pseudo" id="pseudo">
        <label for="password">Choose password</label>
        <input type="text" name="password" id="password">
        <label for="confirm">Confirm password</label>
        <input type="text" name="confirm" id="confirm">
        <button type="submit">Suscribe</button>
    </form>
    <?php
        if($errorMessage != null)
        {
            ?>
            <p class="error_formular"><?php echo $errorMessage;?></p>
            <?php
        }
    ?>
</body>
</html>