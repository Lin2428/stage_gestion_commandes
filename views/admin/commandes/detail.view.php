<?php
new DateTime();
?>

<div class="d-flex align-items-center justify-content-between mb-4">
    <h1 class="h2">Détails de la commande</h1>
    <div class="d-flex">
        <a href="<?= "/admin/commandes/update.php" ?>?id= <?= $commande->getLivreur()->getId() ?>" class="btn btn-info me-2">Changer de livreur</a>
        <form action="<?= "/admin/commandes/delete.php" ?>" method="POST">
            <input type="hidden" name="id" value="<?= $commande->getId() ?>">
            <button type="submit" class="btn btn-danger me-2">Supprimer</button>
        </form>
        <a href="/admin/commandes" class="btn btn-primary">Liste des commandes</a>
    </div>
</div>

<div class="card">
    <div class="card-body m-sm-3 m-md-5">
        <div class="row">
            <div class="col-md-6">
                <div class="text-muted">Numéro de la commande</div>
                <strong><?= $commande->getNumero() ?></strong>
                <p>Statut <span class="badge bg-warning"><?= $commande->getStatut() ?></span></p>
            </div>
            <div class="col-md-6 text-md-end">
                <div class="text-muted">Date de création</div>
                <strong><?= $commande->getCreatedAt() ?></strong>
            </div>
        </div>

        <hr class="my-4">

        <div class="row mb-4">
            <div class="col-md-6">
                <div class="text-muted">Client</div>
                <strong>
                    <strong><?= $commande->getClient()->getNom() . ' ' .  $commande->getClient()->getPrenom() ?></strong>
                </strong>
                <p>
                    <?= $commande->getAdresse() ?><br>
                    <?= $commande->getClient()->getTel() ?><br>
                    <a href="#">
                        <?= $commande->getClient()->getEmail() ?>
                    </a>
                </p>
            </div>
            <div class="col-md-6 text-md-end">
                <div class="text-muted">Livreur</div>
                <strong>
                <?= $commande->getLivreur()->getNom() . ' ' .  $commande->getLivreur()->getPrenom() ?>
                </strong>
                <p>
                <?= $commande->getLivreur()->getTel() ?><br>
                    <a href="#">
                    <?= $commande->getLivreur()->getEmail() ?>
                    </a>
                </p>
            </div>
        </div>

        <table class="table table-sm">
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Prix unitair</th>
                    <th>Quantité</th>
                    <th class="text-end">Montant</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($articles as $article) : ?>
                    <tr>
                        <td><?= $article->getNomProduit() ?></td>
                        <td><?= $article->getPrix() ?> XAF</td>
                        <td><?= $article->getQuantite() ?></td>
                        <td class="text-end"><?= $article->getQuantite() * $article->getPrix() ?></td>
                    </tr>
                <?php endforeach ?>

                <tr>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th>Total </th>
                    <th class="text-end"><?= $total ?> XAF</th>
                </tr>
            </tbody>
        </table>

        <div class="text-md-end">
            <div class="text-muted">Derniere modification </div>
            <strong><?= $commande->getUpdatedAt() ?></strong>
        </div>
    </div>
</div>