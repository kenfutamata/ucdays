<?php

    require_once "includes/dbc.inc.php"; 
    try{    
        $query = "SELECT * FROM authors"; 
        $stmt = $pdo->prepare($query); 
        $stmt -> execute(); 

        $authors  = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    }catch(PDOException $e){
        die("Query Failed: ".$e->getMessage());
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DB Programming</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid px-5">
            <a class="navbar-brand" href="#">Library</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Authors</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="books.php">Books</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="students.php">Students</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-3">
        <a class="btn btn-primary btn-sm my-4" href="add-author.php">Add Author</a>

        <table class="table table-striped">
            <tr>
                <th>ID #</th>
                <th>Firstname</th>
                <th>Middlename</th>
                <th>Lastname</th>
                <th>Action</th>
            </tr>
            <?php foreach ($authors as $author):?>
                <tr>
                <td><?= $author['authID']?></td>
                <td><?= $author['authFName']?></td>
                <td><?= $author['authMName']?></td>
                <td><?= $author['authLName']?></td>
                <td>
                    <a href = "edit-author.php?id=<?= $author['authID']?>">Edit</a>
                    |
                    <a href = "#" onclick="confirm('Are you Sure you want to delete this author?') ? window.location.href = 'includes/delete-author.inc.php?id=<?= $author['authID'] ?>' : ''">Delete</a>
                <td>
            </tr>
            <?php endforeach;?>
        </table>
    </div>
</body>

</html>