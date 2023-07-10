<?php

/**
 *@var Produit[] $produit
 */
?>
<?php foreach ($produit as $pro) : ?>
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h2">Détails du produit</h1>
        <div class="d-flex">
            <a href="<?= "/admin/produits/update.php" ?>?id=<?= $pro->getId() ?>" class="btn btn-info me-2">Modifier</a>
            <form action="<?= "/admin/produits/delete.php" ?>" method="POST">
                <input type="hidden" name="id" value="<?= $pro->getId() ?>">
                <button type="submit" class="btn btn-danger me-2">Supprimer</button>
            </form>
            <a href="admin/products" class="btn btn-primary">Liste des produits</a>
        </div>
    </div>
    <div class="card">

        <div class="card-body h-100">
            <div class="d-flex justify-content-between">
                <div>
                    <?php if ($pro->getStatut() === 0 || $pro->getStock() < 1) : ?>
                        <span class=" badge bg-warning">Hors vente</span>
                    <?php else : ?>
                        <span class=" badge bg-success">En vente</span>
                    <?php endif ?>
                    <h4 class="">ID: <?= $pro->getId() ?></h4>
                    <h4 class="">Nom: <?= $pro->getNom() ?></h4>
                    <h4 class="">Prix: <?= $pro->getPrix() ?> XAF</h4>
                    <h4 class="">Catégorie: <?= $pro->getCategory()  ?></h4>
                    <h4 class="">Stock: <?= $pro->getStock() ?></h4>
                </div>
                <div class="image-detail-produit">
                    <?php if ($pro->getImage()) : ?>
                        <img src="<?= image($pro->getImage()) ?>" alt="image">
                    <?php endif ?>
                </div>
            </div>
            <h4 class="">Description: </h4>
            <p><?= $pro->getDescription() ?></p>
            <hr>
        </div>
    </div>

<?php endforeach ?>