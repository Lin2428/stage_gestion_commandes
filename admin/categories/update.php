<?php
require '../../bootstrap.php';

$id = $_GET['id'];


$repo = new CategoryRepository();
$categorie = $repo->findById($id);

if (is_post()) {
    if (!empty($_POST['nom'])) {
        $repo->updateCategory(
            id: $id,
            nom: $_POST['nom'],
        );

        redirect('/admin/categories', "Le produit à bien été Modifier");
    }
}



view(
    name: 'admin.categories.update',
    pageTitle: "Edition de la categorie",
    params: [
        'id' => $id,
        'categorie' => $categorie,
    ]
);
