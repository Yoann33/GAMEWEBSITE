<?php
require_once 'connect_db.php';

$query = $db->query("SELECT * FROM games");
$games = $query->fetchAll();
$query->closeCursor();

require_once 'View/my_account.php';