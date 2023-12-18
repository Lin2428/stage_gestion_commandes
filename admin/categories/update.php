<?php
require '../../bootstrap.php';
if(!get_admin_connect()){
    header('Location: '. base_url('admin/login.php').'');
    exit;
   }

$id = $_GET['id'];


$repo = new CategoryRepository();
$categorie = $repo->findById($id);

if (is_post()) {
    if (!empty($_POST['nom'])) {
        $image = '';
        if (!empty($_FILES['image']['name'])) {
            $image = uploadImage();
        } else {
            $image = $categorie[0]->getImage();
        }
        if ($image <> "is-invalid"){
            $data = $_POST;
            $data['id'] = $id;
            $data['image'] = $image;
            $repo->updateCategory($data);

            unlink(image($categorie->getImage()));
    
            redirect('/admin/categories', "Le produit à bien été Modifier");
        }
       
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