<?php
require_once("Model/connect_db.php");

if(!isset($_POST["name"],$_POST["description"]) || empty($_POST["name"]) || empty($_POST["description"]))
{
    ?>
    <form action="add_game.php" method="post">
        <label for="name">name</label>
        <input type="text" name="name" id="name">
        <br/>
        <label for="description">description</label>
        <input type="text" name="description" id="description">
        <br/>
        <button type="submit">Add to database</button>
    </form>
    <?php
}
else
{
    $name = strip_tags($_POST["name"]);
    $img_url = "/www/GAMEWEBSITE/Games/".$name."/img.png";
    $description = strip_tags($_POST["description"]);
    echo $name." ".$img_url." ".$description;

    $query = $db->prepare("INSERT INTO games (name, img_url, description) VALUES(:name,:img_url,:description)");
    $query->execute(array(
        'name' => $name,
        'img_url' => $img_url,
        'description' => $description
    ));
    header("Location: add_game.php");
}
?>