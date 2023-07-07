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
            $image = $produit[0]->getImage();
        }
        if ($image <> "is-invalid") {

            $stock = intval($_POST['stock']);

            $data = $_POST;
            $data['id'] = $id;
            $data['stock'] = $stock;
            $data['image'] = $image;

            $stock = intval($_POST['stock']);

            $repo->updateProduit($data);
            unlink(image($produit[0]->getImage()));

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
