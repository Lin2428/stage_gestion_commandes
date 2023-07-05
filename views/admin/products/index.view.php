
<div class="d-flex justify-content-between mb-4">
        <h1 class="h2">Liste des produits</h1>
        <a href="/admin/produits/create.php" class="btn btn-primary">Nouveau</a>
    </div>
    <div class="card">
        <table class="table my-0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Photo</th>
                    <th>Nom</th>
                    <th>Catégorie</th>
                    <th>Prix</th>
                    <th>Stock</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produits as $produit) : ?>
                    <tr>
                        <td><?= $produit['id'] ?></td>
                        <td>
                            <div class="image-liste-produit">
                                <?php if($produit['image']): ?>
                                    <img src="<?= base_url('/img/'. $produit['image'])?>" alt="image">
                                <?php endif ?>
                            </div>
                        </td>
                        <td><?= $produit['nom'] ?></td>
                        <td><?= $produit['category'] ?></td>
                        <td><?= $produit['prix'] ?> XAF</td>
                        <td><?= $produit['stock'] ?></td>
                        <td>
                            <?= actions_produits($produit['id'], "produits") ?>
                        <td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
