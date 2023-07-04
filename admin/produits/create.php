<?php
require '../../bootstrap.php';

$repo = new CategoryRepository();
$category = $repo->getAll();

if (isset($_POST) && !empty(($_POST))) {
    if (!empty($_POST['nom'] && $_POST['prix']) && $_POST['category']) {
        
        $stock = $_POST['stock'];
        if(empty($stock)){
            $stock = "0";
        }

        $creat = new ProductRepository();
        $creat->CreateProduct(
            nom: $_POST['nom'],
            prix: $_POST['prix'],
            stock:  $stock,
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
