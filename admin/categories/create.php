<?php
require '../../bootstrap.php';

$repo = new CategoryRepository();

if (is_post()) {
    if (!empty($_POST['nom'])) {
        $data = $_POST;
        $repo->createCategorie($data);

        redirect("/admin/categories/", "La catégorie a bien été ajouté!");
    }
}

view(
    name: "admin.categories.create",
    pageTitle: "Ajouter Catégories",
    params: []
);
