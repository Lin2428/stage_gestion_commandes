<div class="d-flex justify-content-between mb-4">
    <h1 class="h2">Liste des livreurs</h1>
    <a href="/admin/livreurs/create.php" class="btn btn-primary">Ajouter</a>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-responsive table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Tél</th>
                    <th>Dernier édition</th>
                    <th>Statut</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($livreurs as $livreur) : ?>
                    <tr>
                        <td>
                            <?php if ($livreur['image']) : ?>
                                <img src="<?= base_url('/img/' . $livreur['image']) ?>" class="image-liste-livreur" alt="image">
                            <?php endif ?>
                        </td>
                        <td><?= $livreur['nom'] ?></td>
                        <td><?= $livreur['prenom'] ?></td>
                        <td><?= $livreur['email'] ?></td>
                        <td><?= $livreur['tel'] ?></td>
                        <td><?= $livreur['updated_at'] ?></td>
                        <td><span class="badge bg-success">Active</span></td>
                        <td><?= liste_action(id: $livreur['id'], dossier: "livreurs") ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>