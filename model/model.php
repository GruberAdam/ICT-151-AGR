<?php
/*  Autor : Adam Gruber
    Date : Insert date
    Version : 1.0
    Project : Insert Project Name
*/

//Checks email and password with the json file
function checkLogin($email, $password)
{
    //Get the user in the json file
    $userArray = file_get_contents("model/accounts.json");
    $userArray = json_decode($userArray, true);

    //Checks if the email exists
    foreach ($userArray as $user) {
        if ($user['email'] == $email && $user['password'] == $password){
            return true;
        }
    }
    return false;
}

/**
 * This function will put in a json the data he registered with
 */
function registerToJson($firstName, $email, $password)
{

}