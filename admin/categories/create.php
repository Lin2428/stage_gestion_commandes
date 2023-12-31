<?php
require '../../bootstrap.php';
if(!get_admin_connect()){
    header('Location: '. base_url('admin/login.php').'');
    exit;
   }

$repo = new CategoryRepository();

if (is_post()) {
    if (!empty($_POST['nom'])) {
        $data = $_POST;
        $data['statut'] = 1;
        $repo->createCategorie($data);

        redirect("/admin/categories/", "La catégorie a bien été ajouté!");
    }
}

view(
    name: "admin.categories.create",
    pageTitle: "Ajouter Catégories",
    params: []
);
