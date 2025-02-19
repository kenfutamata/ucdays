<?php


if($_SERVER['REQUEST_METHOD'] == "POST"){
    $firstname = $_POST['firstname']; 
    $middlename = $_POST['middlename']; 
    $lastname = $_POST['lastname']; 

    try{
        require_once "dbc.inc.php"; 

        $query = "INSERT INTO authors (authLName, authFName, authMName) 
        VALUES(:lastname,:firstname,:middlename);";

        $stmt = $pdo->prepare($query);  
        $stmt -> bindParam(":lastname", $lastname); 
        $stmt -> bindParam(":firstname", $firstname); 
        $stmt -> bindParam(":middlename", $middlename);
        
        $stmt->execute(); 

        $pdo = null; 
        $stmt = null; 

        header("Location: ../index.php");

        die(); 
         
    }catch(PDOException $e){
        die("Query failed: ".$e->getMessage()); 
    }
}else{
    header("Location: ../index.php"); 
}

?>