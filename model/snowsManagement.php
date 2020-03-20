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

/* This will get one snow from his code */
function displayOneSnow($code){
    $query = "SELECT * FROM snows.snows WHERE snows.code = '$code'";
    $result = executeQuery($query);

    return $result;
}

/* This will send a insert into to the database to add a snow */
function addSnow($code, $brand,$model,$length,$price,$schedule,$img, $description){
    $query = "INSERT INTO snows.snows (code, brand, model, snowLength, qtyAvailable, description, dailyPrice, photo) VALUES ('$code', '$brand', '$model', '$length', '$schedule', '$description', '$price', '$img');";
    $result = executeQuery($query);

}