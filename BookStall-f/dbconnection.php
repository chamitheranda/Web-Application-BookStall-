<?php
$server = "localhost";
$user = "root";
$pass = "";
$db = "bookstall";
try{
    $con = new PDO("mysql:host = $server;dbname=$db;charset=UTF8",$user,$pass);
    $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //echo "connected";
}
catch(PDOException $e){
    echo $e;
    echo "</br>Error in connection";
}
