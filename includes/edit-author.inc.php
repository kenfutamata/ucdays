<?php


if($_SERVER['REQUEST_METHOD'] == "POST"){
    $firstname = $_POST['firstname']; 
    $middlename = $_POST['middlename']; 
    $lastname = $_POST['lastname']; 
    $id = $_POST['id']; 

    try{
        require_once "dbc.inc.php"; 

        $query = "UPDATE authors SET authLName = :lastname, authFName = :firstname, authMName = :middlename WHERE authID = :id;";

        $stmt = $pdo->prepare($query);  
        $stmt -> bindParam(":lastname", $lastname); 
        $stmt -> bindParam(":firstname", $firstname); 
        $stmt -> bindParam(":middlename", $middlename);
        $stmt -> bindParam(":id", $id);
        
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