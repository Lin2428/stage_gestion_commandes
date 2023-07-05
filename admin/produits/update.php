<?php
require '../../bootstrap.php';

$id = $_GET['id'];


$repo = new ProductRepository();
$produit = $repo->findById($id);
$categories = $repo->getCategoriesLookup();

if (is_post()) {
    if (!empty($_POST['nom'] && $_POST['prix']) && $_POST['category_id']) {
        $image = '';
        if (!empty($_FILES['image']['name'])){
            $image = uploadImage();
        }else{
            $image = $produit['image'];
        }
        if ($image <> "is-invalid") {
            $stock = intval($_POST['stock']);

            $repo->updateProduit(
                id: $id,
                nom: $_POST['nom'],
                prix: $_POST['prix'],
                stock: $stock,
                category: $_POST['category_id'],
                description: $_POST['description'],
                image: $image
            );
            unlink(base_url('/img/'.$produit['image']));

            redirect('/admin/produits', "Le produit à bien été Modifier");
        }
    }
}



view(
    name: 'admin.products.update',
    pageTitle: "Edition du produit",
    params: [
        'id' => $id,
        'produit' => $produit,
        'categories' => $categories,
    ]
);
