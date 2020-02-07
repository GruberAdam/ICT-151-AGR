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
    $file = 'model/accounts.json';

    // If json file is empty we put the array
    // else we append data
    if (file_get_contents($file) == "") {

        //Creates an array of the user inputs
        $dataArray = array([
            'firstname' => $firstName,
            'email' => $email,
            'password' => $password]);

        //Encode and put the content
        $dataArray = json_encode($dataArray, true);
        file_put_contents($file, $dataArray);
    } else {

        //Array based on if json fil had already data
        $dataArray = array(
            'firstname' => $firstName,
            'email' => $email,
            'password' => $password);

        // This basically takes out the json file, decode it, push it with the new array, and put it back in the json
        $tempArray = file_get_contents($file);
        $tempArray = json_decode($tempArray, true);
        array_push($tempArray, $dataArray);
        $dataArray = json_encode($tempArray, true);
        file_put_contents($file, $dataArray);
    }
}