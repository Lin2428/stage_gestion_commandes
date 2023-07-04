<?php
require '../../bootstrap.php';

$repo = new CategoryRepository();
$category = $repo->getAll();

if (isset($_POST) && !empty(($_POST))) {
    var_dump(($_POST));
    if (!empty($_POST['nom'] && $_POST['prix']) && $_POST['category'] && $_POST['stock']) {
        $creat = new ProductRepository();
        $creat->CreateProduct(
            nom: $_POST['nom'],
            prix: $_POST['prix'],
            stock: $_POST['stock'],
            category: $_POST['category'],
            description: $_POST['description']
        );

        flash_message("Le produit à bien été ajouté");
        header('Location: /admin/produits');
    }
}

view(
    name: 'admin.products.create',
    pageTitle: "Ajouter un produit",
    params: [
        'category' => $category,
    ]
);
