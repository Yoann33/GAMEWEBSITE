<?php
function user_verification_existence($password)
{
    try
    {
        $db=new PDO('mysql:host=localhost;dbname=GW_DB','root','');
    }
    catch(Exception $e)
    {
        die('Error : '.$e->getMessage());
    }
    
    $query = $db->query("SELECT * FROM accounts");
    $accounts = $query->fetchAll();
    $query->closeCursor();
    
    if($accounts != null)
    {
        foreach($accounts as $account)
        {
            if(password_verify($password,$account["password"]))
            {
                return true;
            }
        }
    }
    return false;
}
?>