<?php
ob_start();
$article = true;
include_once("header.php");
include_once("main.php");
if (!empty($_POST["inputDescription"]) && !empty($_POST["inputPrixUnitaire"])) {
    $query = "UPDATE  articles SET description=:description, prix_unitaire=:prix_unitaire WHERE idarticle=:id";
    $pdostmt = $pdo->prepare($query);

    $pdostmt->execute([
        "description" => $_POST["inputDescription"],
        "prix_unitaire" => $_POST["inputPrixUnitaire"],
        "id" => $_POST["myid"]
    ]);

    $pdostmt->closeCursor();
    header("Location: articles.php");
    exit();
} 

if (!empty($_GET["id"])) {
    $query = "SELECT * FROM articles WHERE idarticle = :id";
    $pdostmt = $pdo->prepare($query);
    $pdostmt->execute(["id" => $_GET["id"]]);

    while ($row = $pdostmt->fetch(PDO::FETCH_ASSOC)) {  // Suppression du point-virgule ici
?>
        <h1 class="mt-5">Modifier un article</h1>
      
        <form class="row g-3" method="POST">
        <input type="hidden" name="myid" value="<?php echo ($_GET['id']); ?>">

            <div class="col-md-6">
                <label for="inputDescription" class="form-label">Description</label>
                <input class="form-control" id="inputDescription" name="inputDescription" 
                       value="<?php echo ($row["description"]); ?>" required>
            </div>
            <div class="col-md-6">
                <label for="inputPrixUnitaire" class="form-label">Prix Unitaire</label>
                <input class="form-control" id="inputPrixUnitaire" name="inputPrixUnitaire" 
                       value="<?php echo ($row["prix_unitaire"]); ?>" required>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Modifier</button>
            </div>
        </form>

<?php
    } // Fin du while
    $pdostmt->closeCursor();
} 
?>

<?php
include_once("footer.php");
?>
