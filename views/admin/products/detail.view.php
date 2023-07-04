<div class="d-flex justify-content-between">
    <h1 class="h2 d-inline align-middle">Détails du produit</h1>
    <a href="admin/products" class="btn btn-primary mb-4">Liste des produits</a>
</div>
<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0">Détails du produit</h5>
        <div class="d-flex justify-content-between col-2">
            <a href="<?= "/admin/produits/update.php"?>?id=<?= $produit['id'] ?>" class="btn btn-primary btn-sm">Modifier</a>
            <form action="<?= "/admin/produits/delete.php"?>" method="POST">
                <input type="hidden" name="id" value="<?= $produit['id'] ?>">
                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
            </form>
        </div>
    </div>
    <div class="card-body h-100">
        <h4 class="">ID: <?= $produit['id'] ?></h4>
        <h4 class="">Nom: <?= $produit['nom'] ?></h4>
        <h4 class="">Prix: <?= $produit['prix']  ?> XAF</h4>
        <h4 class="">Catégorie: <?= $category['nom']  ?></h4>
        <h4 class="">Stock: <?= $produit['stock'] ?></h4>
        <h4 class="">Description: </h4>
        <p><?= $produit['description'] ?></p>
        <hr>

    </div>
</div>