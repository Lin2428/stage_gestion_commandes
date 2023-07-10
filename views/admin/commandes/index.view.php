<div class="d-flex justify-content-between mb-4">
    <h1 class="h2">Liste des commades</h1>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-responsive " style="width:100%">
            <thead>
                <tr>
                    <th>Numéro</th>
                    <th>Statut</th>
                    <th>Création</th>
                    <th class="text-center">Client</th>
                    <th>ID Livreur</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($commandes as $commande) : ?>
                    <tr>
                        <td><?= $commande->getNumero() ?></td>
                       
                        <td><span class="badge bg-warning"><?= $commande->getStatut() ?></span></td>
                        <td><?= date_format(date_create($commande->getCreatedAt()), 'd/m/Y')  ?></td>
                        <td class="text-center"><?= $commande->clientNom ?></td>
                        <td><?= $commande->livreurNom ?></td>
                        <td><?= liste_action($commande->getId(), "commandes") ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>