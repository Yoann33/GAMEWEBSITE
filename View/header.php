<header>
    <h1><a href="/www/GAMEWEBSITE/index.php">GAMEWEBSITE</a></h1>
    <div class="headerLinks">
        <?php
        if(!isset($_SESSION["user"]))
        {
            ?>
            <a href="/www/GAMEWEBSITE/index.php?controler_file=sign_in">Sign in</a>
            <a href="/www/GAMEWEBSITE/index.php?controler_file=sign_up">Sign up</a>
            <?php
        }
        else
        {
            ?>
            <h1 style="color: green; text-decoration: underline;">Connected:</h1>
            <a href="/www/GAMEWEBSITE/index.php?controler_file=my_account">My account</a>
            <a href="/www/GAMEWEBSITE/index.php?controler_file=sign_out">Sign out</a>
            <?php
            $urlFile = "games";
            if(isset($_GET["controler_file"]))
            {
                $urlFile = $_GET["controler_file"];
            }
            ?>
            <a href=<?php echo "/www/GAMEWEBSITE/index.php?controler_file=unsuscribe&current_file=".$urlFile;?>>Unsuscribe</a>
            <?php
        }
        ?>
    </div>
</header>