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
    if(!empty($_GET["idarticle"])){
        $query = "DELETE FROM articles WHERE idarticle = :id";
        $objstmt = $pdo->prepare($query);
    
        $objstmt->execute([
            "id" =>$_GET["idarticle"]
        ]);

        $objstmt->closeCursor();
        header("Location: articles.php");
        exit();
    }
    include_once("main.php");
    if(!empty($_GET["idcommande"])){
        $query = "DELETE FROM commande WHERE idcommande = :id";
        $objstmt = $pdo->prepare($query);
    
        $objstmt->execute([
            "id" =>$_GET["idcommande"]
        ]);

        $objstmt->closeCursor();
        header("Location: commandes.php");
        exit();
    }
?>