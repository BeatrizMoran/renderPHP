<?php

$servername = "127.0.0.1";
$username = "root";
$password = "";

function connect($servername, $username, $password){
    try{
        $conn = new PDO("mysql:host=$servername;dbname=db1", $username, $password);
        return $conn;
    }
    catch(Exception $e){
        echo $e->getMessage();
    }

}

$dbh = connect($servername, $username, $password);
