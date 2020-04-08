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

/* Modifies a snow with all args */
function modifySnow($code, $brand,$model,$length,$price,$schedule,$img, $description, $active, $id){
    $query = "UPDATE snows.snows SET code = '$code', brand = '$brand', model = '$model', snowLength = '$length', qtyAvailable = '$schedule', description = '$description', dailyPrice = '$price', photo = '$img', active = '$active' WHERE id = '$id';";
    $result = executeQuery($query);
}

/* This will delete a snow by the id given */
function deleteSnowById($id){
    echo "ID IS =". $id;
    $query ="DELETE FROM snows.snows WHERE id = $id";
    $result = executeQuery($query);
}