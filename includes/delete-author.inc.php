<?php


if($_SERVER['REQUEST_METHOD'] == "GET"){

    $id = $_GET['id']; 

    try{
        require_once "dbc.inc.php"; 

        $query = "DELETE FROM authors WHERE authID = :id";

        $stmt = $pdo->prepare($query);  
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