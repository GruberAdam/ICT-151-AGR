<?php
/*  Autor : Adam Gruber
    Date : 16.12.2019
    Version : 1.0
    Project : Insert Project Name
*/
session_start();

//This function redirects on home.php
function home(){
    $_GET["action"] = "home";
    require "view/home.php";
}

/**
 *This function will test if the password and username are empty
 * If it isn't it will check it in an other function
 */
function login(){
    $_GET["action"] = "login";
    //Takes the username / password
    $email = @$_POST['user_email'];
    $password = @$_POST['user_password'];
    //Checks if the username or password is empty
    if ($email == "" || $password == ""){
        require "view/login.php";
    }
    else{
        require "model/model.php";
        //Checks if the password is true
        $connected = checkLogin($email, $password);

        if ($connected){
            //Redirects on home and creates a session variable
            $_SESSION['mail'] = $email;
            home();
        }
        else{
            require "view/login.php";
        }

    }
}

/**
 * This function will destroy the user SESSION when he is login
 */
function logout(){
    $_GET["action"] = "logout";
    $_SESSION = session_destroy();
    home();
}

/**
 * This function will
 * 1. Redirect to the register page
 * 2. Call a function to write in a json file
 */
function register(){
    $firstName = @$_POST['user_register_firstname'];
    $email = @$_POST['user_register_email'];
    $password = @$_POST['user_register_password'];

    if (!isset($firstName) || !isset($email) || !isset($password)){
        require "view/register.php";
    }
    else{
        require "model/model.php";
        registerToJson($firstName, $email, $password);
        require "view/login.php";
    }

}