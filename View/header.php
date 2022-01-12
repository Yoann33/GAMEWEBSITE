<header>
    <h1><a href=<?php echo $filePath;?>>BROWSERGAMES</a></h1>
    <div class="headerLinks">
        <a class = "nav" href="">
            <img src="View/nav.png" alt="top-stroke" id="nav1" class="stroke">
            <img src="View/nav.png" alt="middle-stroke" id="nav2" class="stroke">
            <img src="View/nav.png" alt="bottom-stroke" id="nav3" class="stroke">
        </a>
        <?php
        if(!isset($_SESSION["user"]))
        {
            ?>
            <a href=<?php echo $filePath."?controler_file=sign_in";?>>Sign in</a>
            <a href=<?php echo $filePath."?controler_file=sign_up";?>>Sign up</a>
            <?php
        }
        else
        {
            ?>
            <h1 style="color: green; text-decoration: underline;">Connected</h1>
            <a href=<?php echo $filePath."?controler_file=my_account";?>>My account</a>
            <a href=<?php echo $filePath."?controler_file=sign_out";?>>Sign out</a>
            <?php
            $urlFile = "games";
            if(isset($controlerFile))
            {
                $urlFile = $controlerFile;
            }
            ?>
            <a href="" class="unsuscribe">Unsuscribe</a>
            <?php
        }
        ?>
    </div>
</header>