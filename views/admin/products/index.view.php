<?php
/**
 * @var Produit[] $produits
 */
?>
<div class="d-flex justify-content-between mb-4">
    <h1 class="h2">Liste des produits</h1>
    <a href="/admin/produits/create.php" class="btn btn-primary">Nouveau</a>
</div>
<div class="card pl-0">
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
                    <td><?= $produit->getId() ?></td>
                    <td>
                        <div class="">
                            <img class="image-liste-produit" src="<?= base_url('/img/' . $produit->getImage()) ?>" alt="image">
                        </div>
                    </td>
                    <td><?= $produit->getNom() ?></td>
                    <td><?= $produit->getCategory() ?></td>
                    <td><?= $produit->getPrix() ?> XAF</td>
                    <td><?= $produit->getStock() ?></td>
                    <td>
                        <?= liste_action($produit->getId(), "produits") ?>
                    <td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>