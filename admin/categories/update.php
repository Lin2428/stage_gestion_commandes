<?php
require '../../bootstrap.php';

$id = $_GET['id'];


$repo = new CategoryRepository();
$categorie = $repo->findById($id);

if (is_post()) {
    if (!empty($_POST['nom'])) {
        $data = $_POST;
        $data['id'] = $id;
        $repo->updateCategory($data);

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
