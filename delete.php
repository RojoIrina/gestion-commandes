<?php 
    include_once("main.php");
    if(!empty($_GET["id"])){
        $query = "DELETE FROM clients WHERE idclient = :id";
        $objstmt = $pdo->prepare($query);
    
        $objstmt->execute([
            "id" =>$_GET["id"]
        ]);

        $objstmt->closeCursor();
        header("Location: clients.php");
        exit();
    }
    include_once("main.php");
    if(!empty($_GET["id"])){
        $query = "DELETE FROM articles WHERE idarticle = :id";
        $objstmt = $pdo->prepare($query);
    
        $objstmt->execute([
            "id" =>$_GET["id"]
        ]);

        $objstmt->closeCursor();
        header("Location: articles.php");
        exit();
    }

?>