<?php
function getConnection():PDO{
    $host="localhost";
    $port= 3306;
    $database= "ppdb";
    $username="root";
    $password="12345678";

    return new PDO("mysql:host=$host:$port;dbname=$database",$username,$password);
}
?>