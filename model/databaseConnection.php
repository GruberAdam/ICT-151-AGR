<?php
/**
 * Created by PhpStorm.
 * User: Akame
 * Date: 07/02/2020
 * Time: 16:08
 */

function openDatabaseConnection()
{
    //Database proprieties
    $sqlDriver = 'mysql';
    $hostname = 'localhost';
    $userName = 'SnowUser';
    $userPwd = 'Pa$$w0rd';
    $dbName = 'snows';

    //Creates the dns
    $dns = $sqlDriver . ':host=' . $hostname . ';dbname=' . $dbName;

    // Try to connect to the database
    try {
        $dbConnector = new PDO($dns, $userName, $userPwd);
        echo 'connection worked';
    } //If connection fails
    catch (PDOException $exception) {
        echo 'Connection failed : ' . $exception->getMessage();
    }
}