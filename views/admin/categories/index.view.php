<div>
    <div class="d-flex justify-content-between mb-4">
        <h1 class="h2">Liste des catégorie</h1>
        <a href="/admin/categories/create.php" class="btn btn-primary">Ajouter</a>
    </div>
    <div class="card">
        <table class="table my-0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Action</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $categorie) : ?>
                    <tr>
                        <td><?= $categorie->getId() ?></td>
                        <td><?= $categorie->getNom() ?></td>
                        <td>
                            <?= liste_action(id: $categorie->getId(), dossier: "categories", detail: false, desactive: true) ?>
                        <td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>