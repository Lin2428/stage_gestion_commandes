<?php
require '../../bootstrap.php';

$id = $_GET['id'];
$produitById = new ProductRepository();
$produit = $produitById->findById($id);

$category = new CategoryRepository();
$categorie = $category->getAll();

$categorieActuel = [
    'id' => $categorie[$produit['categorie_id'] -1]['id'],
    'nom' => $categorie[$produit['categorie_id'] -1]['nom']
];

if (isset($_POST) && !empty(($_POST))) {
    if (!empty($_POST['nom'] && $_POST['prix']) && $_POST['category']) {

        $stock = $_POST['stock'];
        if(empty($stock)){
            $stock = "0";
        }

        $produitById->UpdateProduit(
            id: $id,
            nom: $_POST['nom'],
            prix: $_POST['prix'],
            stock: $stock,
            category: $_POST['category'],
            description: $_POST['description']
        );

        flash_message("Le produit à bien été Modifier");
        header('Location: /admin/produits');
    }
}



view(
    name: 'admin.products.update',
    pageTitle: "Edition du produit",
    params: [
        'id' => $id,
        'produit' => $produit,
        'category' => $categorie,
        'categorieActuel' => $categorieActuel,
    ]
);
