<?php

ob_start();
session_start();
        $client=true;
        include_once("header.php");
        include_once("main.php");

        if (!empty($_POST["inputDescription"]) && !empty($_POST["inputPrixUnitaire"])) {
            $query = "INSERT INTO articles (description, prix_unitaire) VALUES (:description, :prix_unitaire)";
            $pdostmt = $pdo->prepare($query);
    
            $pdostmt->execute([
                "description" => $_POST["inputDescription"],
                "prix_unitaire" => $_POST["inputPrixUnitaire"]
            ]);

            $pdostmt->closeCursor();
            header("Location: articles.php");
            exit();
    

        } 

?> 

<h1 class="mt-5">Ajouter Article</h1>
<form class="row g-3" method="POST">
  <div class="col-md-6">
    <label for="inputDescription" class="form-label">Description</label>
    <input   class="form-control" id="inputDescription" name="inputDescription" required>
  </div>
  <div class="col-md-6">
    <label for="inputPrixUnitaire" class="form-label">Prix_unitaire</label>
    <input class="form-control" id="inputPrixUnitaire" name="inputPrixUnitaire" required>
  </div>

  <div class="col-12">
    <button type="submit" class="btn btn-primary">Ajouter</button>
  </div>
</form>




<?php
        include_once("footer.php");
?> 