<?php
require '../../bootstrap.php';

$repository = new CategoryRepository();
$categories = $repository->getAll();

view(
    name: "admin.categories.index",
    pageTitle: "Catégories",
    params: [
        'categories' => $categories,
    ]
);
