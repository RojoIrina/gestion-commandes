<?php
ob_start();
$client = true;
include_once("header.php");
include_once("main.php");
if (!empty($_POST["inputNom"]) && !empty($_POST["inputVille"]) && !empty($_POST["inputTel"])) {
    $query = "UPDATE  clients SET nom=:nom, ville=:ville, telephone=:telephone WHERE idclient=:id";
    $pdostmt = $pdo->prepare($query);

    $pdostmt->execute([
        "nom" => $_POST["inputNom"],
        "ville" => $_POST["inputVille"],
        "telephone" => $_POST["inputTel"],
        "id" => $_POST["myid"]
    ]);

    $pdostmt->closeCursor();
    header("Location: clients.php");
    exit();
} 

if (!empty($_GET["id"])) {
    $query = "SELECT * FROM clients WHERE idclient = :id";
    $pdostmt = $pdo->prepare($query);
    $pdostmt->execute(["id" => $_GET["id"]]);

    while ($row = $pdostmt->fetch(PDO::FETCH_ASSOC)) {  // Suppression du point-virgule ici
?>
        <h1 class="mt-5">Modifier un client</h1>
      
        <form class="row g-3" method="POST">
        <input type="hidden" name="myid" value="<?php echo ($_GET['id']); ?>">

            <div class="col-md-6">
                <label for="inputNom" class="form-label">Nom</label>
                <input class="form-control" id="inputNom" name="inputNom" 
                       value="<?php echo ($row["nom"]); ?>" required>
            </div>
            <div class="col-md-6">
                <label for="inputVille" class="form-label">Ville</label>
                <input class="form-control" id="inputVille" name="inputVille" 
                       value="<?php echo ($row["ville"]); ?>" required>
            </div>
            <div class="col-12">
                <label for="inputTel" class="form-label">Téléphone</label>
                <input type="text" class="form-control" id="inputTel" name="inputTel" 
                       placeholder="+261" value="<?php echo ($row["telephone"]); ?>" required>
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
