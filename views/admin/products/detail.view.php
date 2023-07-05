<div class="d-flex align-items-center justify-content-between mb-4">
    <h1 class="h2">Détails du produit</h1>
    <div class="d-flex">
        <a href="<?= "/admin/produits/update.php" ?>?id=<?= $produit['id'] ?>" class="btn btn-info me-2">Modifier</a>
        <form action="<?= "/admin/produits/delete.php" ?>" method="POST">
            <input type="hidden" name="id" value="<?= $produit['id'] ?>">
            <button type="submit" class="btn btn-danger me-2">Supprimer</button>
        </form>
        <a href="admin/products" class="btn btn-primary">Liste des produits</a>
    </div>
</div>
<div class="card">

    <div class="card-body h-100">
        <div class="d-flex justify-content-between">
            <div>
                <h4 class="">ID: <?= $produit['id'] ?></h4>
                <h4 class="">Nom: <?= $produit['nom'] ?></h4>
                <h4 class="">Prix: <?= $produit['prix']  ?> XAF</h4>
                <h4 class="">Catégorie: <?= $produit['category']  ?></h4>
                <h4 class="">Stock: <?= $produit['stock'] ?></h4>
            </div>
            <div class="image-detail-produit">
                <?php if ($produit['image']) : ?>
                    <img src="<?= base_url('/img/' . $produit['image']) ?>" alt="imaga">
                <?php endif ?>
            </div>
        </div>
        <h4 class="">Description: </h4>
        <p><?= $produit['description'] ?></p>
        <hr>
    </div>
</div>