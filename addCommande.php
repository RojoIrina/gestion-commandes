<?php

ob_start();
session_start();
        $commande=true;
        include_once("header.php");
        include_once("main.php");
        $query="SELECT idclient FROM clients";
        $objstmt = $pdo->prepare($query);
        $objstmt->execute();

        $query2="SELECT idarticle FROM articles";
        $objstmt2 = $pdo->prepare($query2);
        $objstmt2->execute();

        if (!empty($_POST["inputIdCl"]) && !empty($_POST["inputDate"])) {
            $query = "INSERT INTO commande (idclient, date) VALUES (:idclient, :date)";
            $pdostmt = $pdo->prepare($query);
    
            $pdostmt->execute([
                "idclient" => $_POST["inputIdCl"],
                "date" => $_POST["inputDate"]
            ]);

            $idcmd = $pdo->lastInsertId();
            $query2 = "INSERT INTO ligne_commande (idarticle, idcommande, quantite) VALUES (:idarticle, :idcommande, :quantite)";
            $pdostmt2 = $pdo->prepare($query2);
    
            $pdostmt2->execute([
                "idarticle" => $_POST["inputidarticle"],
                "idcommande" => $idcmd,
                "quantite" => $_POST["inputqte"]
            ]);

            $pdostmt2->closeCursor();
            header("Location: commandes.php");
            exit();
    

        } 

?> 

<h1 class="mt-5">Ajouter commande</h1>
<form class="row g-3" method="POST">
  <div class="col-md-6">
    <label for="inputIdCl" class="form-label">IdClient</label>
       
    <select required class="form-control" id="inputIdCl" name="inputIdCl">
            <?php 
                foreach($objstmt->fetchAll(PDO::FETCH_NUM) as $tab){
                    foreach($tab as $elmt){
                        echo "<option value=$elmt>" .$elmt. "</option>";
                    }
                }    
            ?>   
    </select>
  </div>
  <div class="col-md-6">
    <label for="inputDate" class="form-label">Date</label>
    <input type="date" class="form-control" id="inputDate" name="inputDate" required>
  </div>
  <div class="col-md-6">
    <label for="inputidarticle" class="form-label">Article</label>
    <select required class="form-control" id="inputidarticle" name="inputidarticle">
            <?php 
                foreach($objstmt2->fetchAll(PDO::FETCH_NUM) as $tab){
                    foreach($tab as $elmt){
                        echo "<option value=$elmt>" .$elmt. "</option>";
                    }
                }    
            ?>   
    </select>
  </div>
  <div class="col-md-6">
    <label for="inputqte" class="form-label">Quantité</label>
    <input  class="form-control" id="inputqte" name="inputqte" required>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Ajouter</button>
  </div>
</form>




<?php
        include_once("footer.php");
?> 