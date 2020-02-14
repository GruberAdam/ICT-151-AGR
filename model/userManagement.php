<?php
/**
 * Created by PhpStorm.
 * User: Akame
 * Date: 07/02/2020
 * Time: 16:01
 */

require_once "model/databaseConnection.php";

/* This function will open the database, Execute a query, and get the result of a query / return it */
function checkUserAccounts($name, $mail, $psd){
    $query = "SELECT userEmailAddress, userPsw FROM snows.users;";
    $result = executeQuery($query);

    foreach ($result as $user){
        if ($user['userEmailAddress'] == $mail){
            echo 'même email';
        }
        else{
            echo 'email valide';
        }
    }
}