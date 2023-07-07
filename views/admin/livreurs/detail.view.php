<div class="d-flex align-items-center justify-content-between mb-4">
    <h1 class="h2">Détails du livreur</h1>
    <div class="d-flex">
        <a href="<?= "/admin/livreurs/update.php" ?>?id=<?= $livreur[0]->getId() ?>" class="btn btn-info me-2">Modifier</a>
        <form action="<?= "/admin/livreur/delete.php" ?>" method="POST">
            <input type="hidden" name="id" value="<?= $livreur[0]->getId() ?>">
            <button type="submit" class="btn btn-danger me-2">Supprimer</button>
        </form>
        <a href="admin/products" class="btn btn-primary">Liste des livreurs</a>
    </div>
</div>
<div class="card">

    <div class="card-body h-100">
        <div class="d-flex justify-content-between">
            <div>
                <h4 class="">ID: <?= $livreur[0]->getId() ?></h4>
                <h4 class="">Nom: <?= $livreur[0]->getNom() ?></h4>
                <h4 class="">Prénom: <?= $livreur[0]->getPrenom()  ?></h4>
                <h4 class="">Email: <?= $livreur[0]->getEmail()  ?></h4>
                <h4 class="">Tél: <?= $livreur[0]->getTel() ?></h4>
                <h4 class="">Date d'enregistrement: <?= $livreur[0]->getCreatedAt() ?></h4>
                <h4 class="">Derniere Modification: <?= $livreur[0]->getUpdatedAt() ?></h4>
                <h4 class="">Mot de passe: <?= $livreur[0]->getPassword() ?></h4>
            </div>
            <div class="image-detail-produit">
                <?php if ($livreur[0]->getImage()) : ?>
                    <img src="<?= image($livreur[0]->getImage()) ?>" alt="imaga">
                <?php endif ?>
            </div>
        </div>
        <hr>
    </div>
</div>