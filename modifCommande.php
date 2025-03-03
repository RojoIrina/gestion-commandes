<?php
ob_start();
$client = true;
include_once("header.php");
include_once("main.php");

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["myid"])) {
    // Vérification de la présence des champs obligatoires
    if (!empty($_POST["inputIdCl"]) && !empty($_POST["inputDate"]) && !empty($_POST["inputidarticle"]) && !empty($_POST["inputqte"])) {
        try {
            $pdo->beginTransaction();

            // Mise à jour de la commande
            $query = "UPDATE commande SET idclient=:idclient, date=:date WHERE idcommande=:id";
            $pdostmt = $pdo->prepare($query);
            $pdostmt->execute([
                "idclient" => $_POST["inputIdCl"],
                "date" => $_POST["inputDate"],
                "id" => $_POST["myid"]
            ]);

            // Mise à jour de la ligne de commande
            $query2 = "UPDATE ligne_commande SET idarticle=:idarticle, quantite=:quantite WHERE idcommande=:id";
            $pdostmt2 = $pdo->prepare($query2);
            $pdostmt2->execute([
                "idarticle" => $_POST["inputidarticle"],
                "quantite" => $_POST["inputqte"],
                "id" => $_POST["myid"]
            ]);

            $pdo->commit();

            header("Location: commandes.php");
            exit();
        } catch (Exception $e) {
            $pdo->rollBack();
            echo "Erreur : " . htmlspecialchars($e->getMessage());
        }
    } else {
        echo "<p class='alert alert-danger'>Tous les champs sont requis.</p>";
    }
}

// Vérification de la présence de l'ID dans l'URL
if (!empty($_GET["id"])) {
    $query = "SELECT * FROM commande WHERE idcommande = :id";
    $pdostmt = $pdo->prepare($query);
    $pdostmt->execute(["id" => $_GET["id"]]);
    $commande = $pdostmt->fetch(PDO::FETCH_ASSOC);
    $pdostmt->closeCursor();

    $query2 = "SELECT * FROM ligne_commande WHERE idcommande = :id";
    $pdostmt2 = $pdo->prepare($query2);
    $pdostmt2->execute(["id" => $_GET["id"]]);
    $ligneCommande = $pdostmt2->fetch(PDO::FETCH_ASSOC);
    $pdostmt2->closeCursor();

    if (!$commande || !$ligneCommande) {
        echo "<p class='alert alert-warning'>Commande introuvable.</p>";
    } else {
?>
        <h1 class="mt-5">Modifier une commande</h1>
        <form class="row g-3" method="POST">
            <input type="hidden" name="myid" value="<?php echo htmlspecialchars($_GET['id']); ?>">

            <div class="col-md-6">
                <label for="inputIdCl" class="form-label">ID Client</label>
                <input class="form-control" id="inputIdCl" name="inputIdCl" value="<?php echo htmlspecialchars($commande["idclient"]); ?>" required>
            </div>
            <div class="col-md-6">
                <label for="inputDate" class="form-label">Date</label>
                <input class="form-control" type="date" id="inputDate" name="inputDate" value="<?php echo htmlspecialchars($commande["date"]); ?>" required>
            </div>
            <div class="col-md-6">
                <label for="inputidarticle" class="form-label">Article</label>
                <input class="form-control" id="inputidarticle" name="inputidarticle" value="<?php echo htmlspecialchars($ligneCommande["idarticle"]); ?>" required>
            </div>
            <div class="col-md-6">
                <label for="inputqte" class="form-label">Quantité</label>
                <input class="form-control" id="inputqte" name="inputqte" value="<?php echo htmlspecialchars($ligneCommande["quantite"]); ?>" required>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Modifier</button>
            </div>
        </form>
<?php
    }
}
include_once("footer.php");
?>
