<?php
require '../../bootstrap.php';
if(!get_admin_connect()){
    header('Location: '. base_url('admin/login.php').'');
    exit;
   }

$repository = new CategoryRepository();
$categories = $repository->getAll();

view(
    name: "admin.categories.index",
    pageTitle: "Catégories",
    params: [
        'categories' => $categories,
    ]
);
