 <?php
        $index =  true;
        include_once("header.php");
  ?> 


<main class="flex-shrink-0">
  <div class="container mt-5">

    <!-- Section Hero -->
    <section class="hero text-center text-white" style="background: url('https://source.unsplash.com/1600x900/?food,delivery') no-repeat center center; background-size: cover; padding: 80px 20px; border-radius: 8px;">
        <h1 class="display-4 fw-bold">Bienvenue sur notre système de gestion de commande</h1>
        <p class="lead mb-4">Optimisez vos ventes et gérez vos commandes de manière fluide et rapide.</p>
        <a href="commandes.php" class="btn btn-light btn-lg px-4 py-2">Voir les commandes</a>
    </section>

    <!-- Cards Section -->
    <div class="row row-cols-1 row-cols-md-3 g-4 mt-5">
        <div class="col">
            <div class="card shadow border-0 rounded-3">
                <div class="card-body text-center">
                    <i class="fas fa-shopping-cart fa-3x text-primary mb-3"></i>
                    <h5 class="card-title">Gestion des Commandes</h5>
                    <p class="card-text">Suivez, gérez et modifiez vos commandes en temps réel.</p>
                    <a href="commandes.php" class="btn btn-outline-primary">Voir les commandes</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card shadow border-0 rounded-3">
                <div class="card-body text-center">
                    <i class="fas fa-box fa-3x text-success mb-3"></i>
                    <h5 class="card-title">Gestion des Produits</h5>
                    <p class="card-text">Ajoutez, modifiez et suivez l'inventaire de vos produits.</p>
                    <a href="articles.php" class="btn btn-outline-success">Voir les produits</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card shadow border-0 rounded-3">
                <div class="card-body text-center">
                    <i class="fas fa-users fa-3x text-warning mb-3"></i>
                    <h5 class="card-title">Gestion des Clients</h5>
                    <p class="card-text">Gérez les informations et commandes de vos clients.</p>
                    <a href="clients.php" class="btn btn-outline-warning">Voir les clients</a>
                </div>
            </div>
        </div>
    </div>

  </div>
</main>

<?php
        include_once("footer.php");
?> 