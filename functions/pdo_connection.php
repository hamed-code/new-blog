<?php

$serverName = 'localhost';
$userName = 'root';
$password = '';
$dbName = 'weblog';

try{
 $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => 
 PDO:: FETCH_OBJ);
$conn = new PDO("mysql:host=$serverName;dbname=$dbName",$userName,$password,$options);
   
}
catch(PDOException $e){
    echo "Error!" . $e->getMessage();
}