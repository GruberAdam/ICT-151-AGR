<?php
/**
 * Created by PhpStorm.
 * User: Akame
 * Date: 07/02/2020
 * Time: 16:01
 */

require_once "model/databaseConnection.php";

/* This function will open the database, Execute a query, and get the result of a query
    And check if the same email is in the database
*/
function checkUserAccounts($username, $mail, $password)
{

    $query = "SELECT userEmailAddress FROM snows.users;"; // Query
    $result = executeQuery($query); //Result is every user in the database

    // Checks for every user if the email already exits
    foreach ($result as $user) {
        if ($user['userEmailAddress'] == $mail) {
            /* If they are similar */
            $_GET['register-error'] = true;
            return false;
        }
    }
    $_GET['register-success'] = true;
    return true;
}

function addUser($username, $mail, $password)
{
    $query = "INSERT INTO snows.users (userEmailAddress, userPsw, pseudo) VALUES ('$mail', '$password', '$username');";
    $result = executeQuery($query);
    return $result;
}