<?php

ob_start();
session_start();
        $client=true;
        include_once("header.php");
        include_once("main.php");

        if (!empty($_POST["inputNom"]) && !empty($_POST["inputVille"]) && !empty($_POST["inputTel"])) {
            $query = "INSERT INTO clients (nom, ville, telephone) VALUES (:nom, :ville, :telephone)";
            $pdostmt = $pdo->prepare($query);
    
            $pdostmt->execute([
                "nom" => $_POST["inputNom"],
                "ville" => $_POST["inputVille"],
                "telephone" => $_POST["inputTel"]
            ]);

            $pdostmt->closeCursor();
            header("Location: clients.php");
            exit();
    

        } 

?> 

<h1 class="mt-5">Ajouter client</h1>
<form class="row g-3" method="POST">
  <div class="col-md-6">
    <label for="inputNom" class="form-label">Nom</label>
    <input   class="form-control" id="inputNom" name="inputNom" required>
  </div>
  <div class="col-md-6">
    <label for="inputVille" class="form-label">Ville</label>
    <input class="form-control" id="inputVille" name="inputVille" required>
  </div>
  <div class="col-12">
    <label for="inputTel" class="form-label">Telephone</label>
    <input type="text" class="form-control" id="inputTel" name="inputTel" placeholder="1234 Main St" required>
  </div>

  <div class="col-12">
    <button type="submit" class="btn btn-primary">Ajouter</button>
  </div>
</form>
</form>



<?php
        include_once("footer.php");
?> 