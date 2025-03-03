<?php
$client = true;
include_once("header.php");
include_once("main.php");

$count = 0;
$list = [];

// Exécution de la requête
$query = "SELECT c.nom, c.telephone, c.ville, cmd.date, art.description, art.prix_unitaire, lc.quantite
          FROM clients AS c 
          JOIN commande AS cmd ON c.idclient = cmd.idclient
          JOIN ligne_commande AS lc ON cmd.idcommande = lc.idcommande
          JOIN articles AS art ON art.idarticle = lc.idarticle";
$pdostmt = $pdo->prepare($query);
$pdostmt->execute();

// Récupérer toutes les données d'un coup
$clients = $pdostmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h1 class="mt-5">Vue d'ensemble</h1>

<table id="datatable" class="display">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Ville</th>
            <th>TELEPHONE</th>
            <th>DATE</th>
            <th>DESCRIPTION</th>
            <th>PRIX_UNITAIRE</th>
            <th>QUANTITE</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($clients as $ligne): 
            $count++;
        ?>
            <tr>
                <td><?php echo htmlspecialchars($ligne["nom"]); ?></td>
                <td><?php echo htmlspecialchars($ligne["ville"]); ?></td>
                <td><?php echo htmlspecialchars($ligne["telephone"]); ?></td>
                <td><?php echo htmlspecialchars($ligne["date"]); ?></td>
                <td><?php echo htmlspecialchars($ligne["description"]); ?></td>
                <td><?php echo htmlspecialchars($ligne["prix_unitaire"]); ?></td>
                <td><?php echo htmlspecialchars($ligne["quantite"]); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</div>
</main>

<?php
include_once("footer.php");
?>
