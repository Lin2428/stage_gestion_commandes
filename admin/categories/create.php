<?php
require '../../bootstrap.php';

$repo = new CategoryRepository();

if (is_post()) {
    if (!empty($_POST['nom'])) {
        $repo->createCategorie($_POST['nom']);

        redirect("/admin/categories/", "La catégorie a bien été ajouté!");
    }
}

view(
    name: "admin.categories.create",
    pageTitle: "Catégories",
    params: []
);
