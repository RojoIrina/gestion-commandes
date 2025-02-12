<?php

        $client=true;
        include_once("header.php");
        include_once("main.php");

        if (!empty($_GET["id"])) {
            $query = "SELECT * FROM clients WHERE idclient=:id";
            $pdostmt = $pdo->prepare($query);
    
            $pdostmt->execute([
                "id" => $_GET["id"]
            ]);
            while($row=$pdostmt->fetch(PDO::FETCH_ASSOC))
            
?> 

        <h1 class="mt-5">Mofifier un client</h1>
        <form class="row g-3" method="POST">
        <div class="col-md-6">
            <label for="inputNom" class="form-label">Nom</label>
            <input   class="form-control" id="inputNom" name="inputNom" value=<?php echo $row["nom"]?> required>
        </div>
        <div class="col-md-6">
            <label for="inputVille" class="form-label">Ville</label>
            <input class="form-control" id="inputVille" name="inputVille" value=<?php echo $row["ville"]?> required>
        </div>
        <div class="col-12">
            <label for="inputTel" class="form-label">Telephone</label>
            <input type="text" class="form-control" id="inputTel" name="inputTel" placeholder="+261" value=<?php echo $row["telephone"]?> required>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </div>
        </form>
        </form>

        <?php
        }   
        ?> 

<?php
        include_once("footer.php");
?> 