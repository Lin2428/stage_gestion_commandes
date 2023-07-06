<?php
require '../../bootstrap.php';

$repo = new ProductRepository();
$categories = $repo->getCategoriesLookup();

if (is_post()) {
    if (!empty($_POST['nom'] && $_POST['prix']) && $_POST['category_id']) {
        $image = '';
        if (!empty($_FILES)) {
            $image = uploadImage();
        }
        if ($image != "is-invalid") {
            $stock = intval($_POST['stock']);

            $data = $_POST;

            $data['stock'] = $stock;
            $data['image'] = $image;

            $repo->createProduct($data);

            redirect('/admin/produits', 'Le produit à bien ét& créer!');
        }
    }
}

view(
    name: 'admin.products.create',
    pageTitle: "Ajouter un produit",
    params: [
        'categories' => $categories,
    ]
);
