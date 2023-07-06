<div class="d-flex justify-content-between mb-4">
    <h1 class="h2">Liste des commades</h1>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-responsive table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Numéro</th>
                    <th>Statut</th>
                    <th>Création</th>
                    <th>Edition</th>
                    <th class="text-center">Client</th>
                    <th>Livreur</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($commandes as $commande) : ?>
                    <tr>
                        <td><?= $commande['id'] ?></td>
                        <td><?= $commande['numero'] ?></td>
                       
                        <td><span class="badge bg-warning"><?= $commande['statut'] ?></span></td>
                        <td><?= $commande['created_at'] ?></td>
                        <td><?= $commande['updated_at'] ?></td>
                        <td><?= $commande['nom_client'] .' '. $commande['prenom_client'] ?></td>
                        <td><?= $commande['nom_livreur'] ?></td>
                        <td><?= liste_action($commande['id'], "commandes") ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>