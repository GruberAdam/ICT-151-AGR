<?php
/**
 * Created by PhpStorm.
 * User: Akame
 * Date: 20/03/2020
 * Time: 12:55
 */


$id = intval($_GET['index']);

$query = "SELECT * FROM snows WHERE id = $id ;";

require_once "databaseConnection.php";
$result = executeQuery($query);

foreach ($result as $snow){
    echo $snow['code'];
}