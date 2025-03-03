<?php 
    include_once("main.php");
    if (!empty($_GET["idcommande"])) {
        $query2 = "DELETE FROM ligne_commande WHERE idcommande = :id";
        $objstmt2 = $pdo->prepare($query2);
        $objstmt2->execute(["id" => $_GET["idcommande"]]);
        $objstmt2->closeCursor();
        $query = "DELETE FROM commande WHERE idcommande = :id";
        $objstmt = $pdo->prepare($query);
        $objstmt->execute(["id" => $_GET["idcommande"]]);
        
        header("Location: commandes.php");
        exit();
    }
    
    if (!empty($_GET["idarticle"])) {
        $query = "DELETE FROM articles WHERE idarticle = :id";
        $objstmt = $pdo->prepare($query);
        $objstmt->execute(["id" => $_GET["idarticle"]]);
        $objstmt->closeCursor();
        header("Location: articles.php");
        exit();
    }
    
    if (!empty($_GET["id"])) {
        $query = "DELETE FROM clients WHERE idclient = :id";
        $objstmt = $pdo->prepare($query);
        $objstmt->execute(["id" => $_GET["id"]]);
        $objstmt->closeCursor();
        header("Location: clients.php");
        exit();
    }
    
?>