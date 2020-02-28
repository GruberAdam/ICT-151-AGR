<?php
/*  Autor : Adam Gruber
    Date : 16.12.2019
    Version : 1.0
    Project : Insert Project Name
*/
session_start();


require_once "model/model.php";
require_once "model/userManagement.php";

//This function redirects on home.php
function home()
{
    $_GET["action"] = "home";
    require "view/home.php";
}

/**
 *This function will test if the password and username are empty
 * If it isn't it will check it in an other function
 */
function login()
{
    $_GET["action"] = "login";

    //Takes the username / password
    $username = @$_POST['user_login_username'];
    $password = @$_POST['user_login_password'];

    //Checks if the username or password is empty
    if (!isset($username) || !isset($password)) {
        require "view/login.php";
    } else {
        //Checks if the password is true
        $connected = checkLogin($username, $password);

        if ($connected) {
            //Redirects on home and creates a session variable
            $_SESSION['pseudo'] = $username;
        }
        require_once "view/login.php";
    }
}

/**
 * This function will destroy the user SESSION when he is login
 */
function logout()
{
    $_GET["action"] = "logout";
    $_SESSION = session_destroy();
    home();
}

/**
 * This function will
 * 1. Redirect to the register page
 * 2. Call a function to write in a json file
 */
function register()
{
    $_GET["action"] = "register";

    /* Get inputs */
    $username = @$_POST['user_register_username'];
    $email = strtolower(@$_POST['user_register_email']); //Puts the hole string in lowercase
    $password = password_hash(@$_POST['user_register_password'], PASSWORD_DEFAULT); //hashes the password

    /* Checks if the imputs are empty */
    if (!isset($username) || !isset($email) || !isset($password)) {
        require_once "view/register.php";
    } else {
        /* Checks if an ancout with the same email was already created */
        $result = checkUserAccounts($email);
        if ($result) {
            /* Add the user */
            $output = addUser($username, $email, $password);
        }
        require_once "view/register.php";
    }
}

function products(){
    require_once "view/snows.php";
}