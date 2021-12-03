<header>
    <h1>GAME WEBSITE</h1>
    <div class="headerLinks">
        <?php
        if(!isset($_SESSION["user"]))
        {
            ?>
            <a href="Controler/sign_in.php">sign in</a>
            <a href="Controler/sign_up.php">sing up</a>
            <?php
        }
        else
        {
            ?>
            <a href="Controler/my_account.php">My account</a>
            <a href="Controler/sign_out">sign out</a>
            <?php
        }
        ?>
    </div>
</header>