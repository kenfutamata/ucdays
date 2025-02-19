<?php

$conn = "mysql:host=localhost;dbname=library";
$dbusername = "root"; 
$dbpassword = ""; 

try{
    $pdo = new PDO($conn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, 
    PDO::ERRMODE_EXCEPTION); 
}catch(PDOException $e){
    echo "Connection Failed: ".$e->getMessage(); 
}
 
?>