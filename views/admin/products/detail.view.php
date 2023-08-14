
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h2">Détails du produit</h1>
        <div class="d-flex">
            <a href="<?= "/admin/produits/update.php" ?>?id=<?= $produit->getId() ?>" class="btn btn-info me-2">Modifier</a>
            <form action="<?= "/admin/produits/delete.php" ?>" method="POST">
                <input type="hidden" name="id" value="<?= $produit->getId() ?>">
                <button type="submit" class="btn btn-danger me-2">Supprimer</button>
            </form>
            <a href="admin/products" class="btn btn-primary">Liste des produits</a>
        </div>
    </div>
    <div class="card">

        <div class="card-body h-100">
            <div class="d-flex justify-content-between">
                <div>
                    <?php if ($produit->getStatut() === 0 || $produit->getStock() < 1) : ?>
                        <span class=" badge bg-warning">Hors vente</span>
                    <?php else : ?>
                        <span class=" badge bg-success">En vente</span>
                    <?php endif ?>
                    <h4 class="">ID: <?= $produit->getId() ?></h4>
                    <h4 class="">Nom: <?= $produit->getNom() ?></h4>
                    <h4 class="">Prix: <?= $produit->getPrix() ?> XAF</h4>
                    <h4 class="">Catégorie: <?= $produit->getCategory()  ?></h4>
                    <h4 class="">Stock: <?= $produit->getStock() ?></h4>
                </div>
                <div class="image-detail-produit">
                    <?php if ($produit->getImage()) : ?>
                        <img src="<?= image($produit->getImage()) ?>" alt="image">
                    <?php endif ?>
                </div>
            </div>
            <h4 class="">Description: </h4>
            <p><?= $produit->getDescription() ?></p>
            <hr>
        </div>
    </div>