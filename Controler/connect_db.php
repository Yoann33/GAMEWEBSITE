<?php
//Initie la connexion avec la base de donnée.
try
{
    $db=new PDO('mysql:host=localhost;dbname=gw_db','root','');
}
catch(Exception $e)
{
    die('Error : '.$e->getMessage());
}