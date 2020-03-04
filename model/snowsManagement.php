<?php
/*  Autor : Adam Gruber
    Date : Insert date
    Version : 1.0 
    Project : Insert Project Name
*/
require_once "model/databaseConnection.php";

/* This will return an array of all database informations about snows */
function displaySnows(){
    $query = "SELECT * FROM snows.snows;";
    $result = executeQuery($query);

    return $result;
}

function displayOneSnow($code){
    $query = "SELECT * FROM snows.snows WHERE snows.code = '$code'";
    $result = executeQuery($query);

    return $result;
}
