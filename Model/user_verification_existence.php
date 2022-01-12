<?php
function user_verification_existence($password,$email)
{
    global $db;
    $query = $db->query("SELECT * FROM accounts");
    $accounts = $query->fetchAll();
    $query->closeCursor();
    
    if($accounts != null)
    {
        foreach($accounts as $account)
        {
            if(password_verify($password,$account["password"]) && $email == $account["email"])
            {
                return true;
            }
        }
    }
    return false;
}
?>