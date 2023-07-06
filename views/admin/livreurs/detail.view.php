<div class="d-flex align-items-center justify-content-between mb-4">
    <h1 class="h2">Détails du livreur</h1>
    <div class="d-flex">
        <a href="<?= "/admin/livreurs/update.php" ?>?id=<?= $livreur['id'] ?>" class="btn btn-info me-2">Modifier</a>
        <form action="<?= "/admin/livreur/delete.php" ?>" method="POST">
            <input type="hidden" name="id" value="<?= $livreur['id'] ?>">
            <button type="submit" class="btn btn-danger me-2">Supprimer</button>
        </form>
        <a href="admin/products" class="btn btn-primary">Liste des produits</a>
    </div>
</div>
<div class="card">

    <div class="card-body h-100">
        <div class="d-flex justify-content-between">
            <div>
                <h4 class="">ID: <?= $livreur['id'] ?></h4>
                <h4 class="">Nom: <?= $livreur['nom'] ?></h4>
                <h4 class="">Prénom: <?= $livreur['prenom']  ?> XAF</h4>
                <h4 class="">Email: <?= $livreur['email']  ?></h4>
                <h4 class="">Tél: <?= $livreur['tel'] ?></h4>
                <h4 class="">Date d'enregistrement: <?= $livreur['created_at'] ?></h4>
                <h4 class="">Derniere Modification: <?= $livreur['updated_at'] ?></h4>
                <h4 class="">Mot de passe: <?= $livreur['password'] ?></h4>
            </div>
            <div class="image-detail-produit">
                <?php if ($livreur['image']) : ?>
                    <img src="<?= base_url('/img/' . $livreur['image']) ?>" alt="imaga">
                <?php endif ?>
            </div>
        </div>
        <hr>
    </div>
</div>