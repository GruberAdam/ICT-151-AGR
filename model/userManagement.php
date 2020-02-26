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
function checkUserAccounts($mail)
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

/* This will check if the username and password inputed is in the database */
function checkLogin($username, $password)
{

    /* Creates a query and executes it */
    $query = "SELECT pseudo, userPsw FROM snows.users;";
    $result = executeQuery($query);

    /* Checks if the username and password are in the database */
    foreach ($result as $user) {
        if ($username == $user['pseudo'] && password_verify($password, $user['userPsw'])) {
            $_GET['login-success'] = true;
            return true;
        }
    }
    /* If no credentials matching were found */
    $_GET['login-error'] = true;
    return false;

}