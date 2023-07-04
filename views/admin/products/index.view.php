<div>
    <div class="d-flex justify-content-between mb-4">
        <h1 class="h2">Liste des produits</h1>
        <a href="/admin/produits/create.php" class="btn btn-primary">Nouveau</a>
    </div>
    <?= $message ?>
    <div class="card">
        <table class="table my-0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Catégorie</th>
                    <th>Prix</th>
                    <th>Stock</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($produits as $produit): ?>
                    <tr>
                        <td><?= $produit['id'] ?></td>
                        <td><?= $produit['nom'] ?></td>
                        <td><?= $produit['category'] ?></td>
                        <td><?= $produit['prix'] ?></td>
                        <td><?= $produit['stock'] ?></td>
                        <td><?=actions_produits($produit['id'])?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>