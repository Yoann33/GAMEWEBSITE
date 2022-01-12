<?php
require_once 'connect_db.php';
$userId = $_SESSION["user"]["id"];

$delete = $db->prepare("DELETE FROM favorites WHERE user_id=:user_id");
$delete->execute(array(
    "user_id" => $userId
));

$delete = $db->prepare("DELETE FROM accounts WHERE id=:id");
$delete->execute(array(
    "id" => $userId
));
$delete->closeCursor();

require_once 'sign_out.php';