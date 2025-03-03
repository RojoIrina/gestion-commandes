<?php
$ligne_commande =  true;
include_once("header.php");
include_once("main.php");

$count = 0;
$list=[];
    $query="SELECT idcommande FROM  commande WHERE idcommande IN (SELECT idcommande FROM ligne_commande  WHERE commande.idcommande=ligne_commande.idcommande)";
    $pdostmt=$pdo->prepare($query);
    $pdostmt->execute();
    foreach($pdostmt->fetchAll(PDO::FETCH_NUM) as $tabvalues){
        foreach($tabvalues as $tabelements){
            $list[]=$tabelements;
        }
    }
?> 


<!-- Begin page content -->

<h1 class="mt-5">Commandes</h1>
    <a href="addCommande.php" class="btn btn-primary" style="float:right;margin-bottom:px;">
        <i class="fas fa-shipping-fast"></i>
    </a> 

<?php
$query = "select * from commande";
$pdostmt = $pdo->prepare($query);
$pdostmt->execute();
//var_dump($pdostmt->fetchAll(PDO::FETCH_ASSOC))

?>
<table id="datatable" class="display">
    <thead>
        <tr>
            <th>ID</th>
            <th>IDCLIENT</th>
            <th>DATE</th>
            <th>ACTION</th>

        </tr>
    </thead>
    <tbody>
        <?php while ($ligne = $pdostmt->fetch(PDO::FETCH_ASSOC)): 
            $count ++;
        ?>
            <tr>
                <td><?php echo $ligne["idcommande"]; ?></td>
                <td><?php echo $ligne["idclient"]; ?></td>
                <td><?php echo $ligne["date"]; ?></td>
              
                <td>
                    <a href="modifCommande.php?id=<?php echo $ligne["idcommande"]?>" class="btn btn-success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                             <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z"/>
                        </svg>
                    </a> 
                    <button  class="btn btn-outline-danger" data-bs-toggle="modal"  data-bs-target="#deleteModal<?php echo $count ?>" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                        </svg>
                    </button>

                </td>
            </tr>

            <div class="modal fade" id="deleteModal<?php echo $count ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModal">Suppression</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                Voulez-vous supprimer cette commande?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <a href="delete.php?idcommande=<?php echo $ligne["idcommande"] ?>" type="button" class="btn btn-danger">Supprimer</a>

                </div>
                </div>
            </div>
            </div>
        <?php endwhile; ?>

    </tbody>
</table>
</div>
</main>

<?php
include_once("footer.php");
?> 