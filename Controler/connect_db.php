<?php
//Initie la connexion avec la base de donnée MVCexample.
try
{
    $db=new PDO('mysql:host=localhost;dbname=GW_DB','root','');
}
catch(Exception $e)
{
    die('Error : '.$e->getMessage());
}