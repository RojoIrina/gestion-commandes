<?php
        $client =  true;
        include_once("header.php");
        include_once("main.php");
    ?> 


<!-- Begin page content -->

    <h1 class="mt-5">Clients</h1>
    <?php 
     $query="select * from clients";
     $pdostmt=$pdo->prepare($query);
     $pdostmt->execute();
     //var_dump($pdostmt->fetchAll(PDO::FETCH_ASSOC))

    ?>
    <table id="datatable" class="display">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Ville</th>
            <th>TELEPHONE</th>
        </tr>
    </thead>
    <tbody>
        <?php while($ligne=$pdostmt->fetch(PDO::FETCH_ASSOC)):?>
            <tr>
                <td><?php echo $ligne["idclient"]; ?></td>
                <td><?php echo $ligne["nom"]; ?></td>
                <td><?php echo $ligne["ville"]; ?></td>
                <td><?php echo $ligne["telephone"]; ?></td>
            </tr>
     <?php endwhile; ?>   
        
    </tbody>
</table>
   </div>
</main>

<?php
        include_once("footer.php");
?> 