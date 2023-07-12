<?php

/**
 * @var Produit[] $produits
 */

$status = [
    '' => 'Selectionner un statuts',
    '1' => 'Produit en vente',
    '0' => 'Produit hors vente',
];

array_unshift($categories, 'Selectionner une catégories')
?>
<div class="d-flex justify-content-between mb-4">
    <h1 class="h2">Liste des produits</h1>
    <a href="/admin/produits/create.php" class="btn btn-primary">Nouveau</a>
</div>
<div class="">
    <form method="GET" class="d-flex justify-content-between mb-2" role="search">
        <?= form_input(label: false, name: 'nom', required: false, placeholder: 'Réchercher par nom', valueSource: 'GET') ?>
        <?= form_input(label: false, name: "category", type: "select", required: false, options: $categories, valueSource: 'GET') ?>
        <?= form_input(type: "number", label: false, name: 'search', required: false, placeholder: 'numéro ou prix', valueSource: 'GET') ?>
        <?= form_input(label: false, name: "statut", type: "select", required: false, options: $status, valueSource: 'GET') ?>
        <button class="btn btn-outline-secondary" type="submit"><span data-feather="search"></span></button>
    </form>
</div>

<div class="card pl-0">
    <div class="card-body">
        <table class="table my-0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Photo</th>
                    <th>Nom</th>
                    <th>Catégorie</th>
                    <th>Prix</th>
                    <th>Stock</th>
                    <th>Statut</th>
                    <th>Actions</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produits as $produit) : ?>
                    <tr>
                        <td><?= $produit->getId() ?></td>
                        <td>
                            <div class="">
                                <img class="image-liste-produit" src="<?= image($produit->getImage()) ?>" alt="image">
                            </div>
                        </td>
                        <td><?= $produit->getNom() ?></td>
                        <td><?= $produit->getCategory() ?></td>
                        <td><?= $produit->getPrix() ?> XAF</td>
                        <td><?= $produit->getStock() ?></td>
                        <td>
                            <?php if ($produit->getStatut() === 0) : ?>
                                <span class=" badge bg-warning">Hors vente</span>
                            <?php else : ?>
                                <span class=" badge bg-success">En vente</span>
                            <?php endif ?>

                        </td>
                        <td>
                            <?= liste_action($produit->getId(), "produits", desactive: true, statut: $produit->getStatut()) ?>
                        <td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <br>
        <div class="d-flex justify-content-center align-items-center">
            <?php paginate($pageCount, $page, '/admin/produits'); ?>
        </div>
    </div>
</div>