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
    $dbConnector = null;
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
    return $dbConnector;
}

/* Executes the query */
function executeQuery($query)
{
    $databaseConnection = openDatabaseConnection();
    if ($databaseConnection != null) {
        $statement = $databaseConnection->prepare($query);
        $statement->execute();//execute query
        $queryResult = $statement->fetchAll();//prepare result for client
    }
    $databaseConnection = null;
    return $queryResult;
}