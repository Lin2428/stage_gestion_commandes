<div class="d-flex align-items-center justify-content-between mb-4">
    <h1 class="h2">Détails de la commande</h1>
    <div class="d-flex">
        <a href="<?= "/admin/commandes/update.php" ?>?id=<?= $commande['id'] ?>" class="btn btn-info me-2">Changer de livreur</a>
        <form action="<?= "/admin/commandes/delete.php" ?>" method="POST">
            <input type="hidden" name="id" value="<?= $commande['id'] ?>">
            <button type="submit" class="btn btn-danger me-2">Supprimer</button>
        </form>
        <a href="admin/commandes" class="btn btn-primary">Liste des commandes</a>
    </div>
</div>

<div class="card">
    <div class="card-body m-sm-3 m-md-5">
        <div class="row">
            <div class="col-md-6">
                <div class="text-muted">Numéro de la commande</div>
                <strong><?= $commande['numero'] ?></strong>
                <p>Statut <span class="badge bg-warning"><?= $commande['statut'] ?></span></p>
            </div>
            <div class="col-md-6 text-md-end">
                <div class="text-muted">Date de création</div>
                <strong><?= $commande['created_at'] ?></strong>
            </div>
        </div>

        <hr class="my-4">

        <div class="row mb-4">
            <div class="col-md-6">
                <div class="text-muted">Client</div>
                <strong>
                    <strong><?= $commande['nom_client'] . ' ' .  $commande['prenom_client'] ?></strong>
                </strong>
                <p>
                    <?= $commande['adresse'] ?><br>
                    <?= $commande['tel_client'] ?><br>
                    <a href="#">
                        <?= $commande['email_client'] ?>
                    </a>
                </p>
            </div>
            <div class="col-md-6 text-md-end">
                <div class="text-muted">Livreur</div>
                <strong>
                    <?= $commande['nom_livreur'] . ' ' .  $commande['prenom_livreur'] ?>
                </strong>
                <p>
                    <?= $commande['tel_livreur'] ?><br>
                    <a href="#">
                        <?= $commande['email_livreur'] ?>
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
                        <td><?= $article['nom_produit'] ?></td>
                        <td><?= $article['prix'] ?> XAF</td>
                        <td><?= $article['quantite'] ?></td>
                        <td class="text-end"><?= $article['quantite'] * $article['prix'] ?></td>
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
            <strong><?= $commande['updated_at'] ?></strong>
        </div>
    </div>
</div>