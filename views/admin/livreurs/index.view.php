<div class="d-flex justify-content-between mb-4">
    <h1 class="h2">Liste des livreurs</h1>
    <a href="/admin/livreurs/create.php" class="btn btn-primary">Ajouter</a>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-responsive" style="width:100%">
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Tél</th>
                    <th>Statut</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($livreurs as $livreur) : ?>
                    <tr>
                        <td>
                            <?php if ($livreur->getImage()) : ?>
                                <img src="<?= image($livreur->getImage()) ?>" class="image-liste-livreur" alt="image">
                            <?php endif ?>
                        </td>
                        <td><?= $livreur->getNom() ?></td>
                        <td><?= $livreur->getPrenom() ?></td>
                        <td><?= $livreur->getEmail() ?></td>
                        <td><?= $livreur->getTel() ?></td>
                        <td><?php if ($livreur->getStatut() === 0) : ?>
                                <span class=" badge bg-warning">Inactif</span>
                            <?php else : ?>
                                <span class=" badge bg-success">Actif</span>
                            <?php endif ?>
                        </td>
                        <td><?= liste_action(id: $livreur->getId(), dossier: "livreurs", desactive: true, statut: $livreur->getStatut()) ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>