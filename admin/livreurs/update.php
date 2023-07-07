<?php
require '../../bootstrap.php';

$id = $_GET['id'];

$repo = new LivreurRepository();
$livreur = $repo->findById($id);

if (is_post()) {
    if (!empty($_POST['nom'] && $_POST['prenom'] && $_POST['email'] && $_POST['tel'])) {
        $image = '';
        $password = '';
        if (!empty($_FILES['image']['name'])) {
            $image = uploadImage();
        } else {
            $image = $livreur[0]->getImage();
        }

        if (!empty($_POST['password'])) {
            $password = $_POST['password'];
        } else {
            $password = $livreur[0]->getPassword();
        }

        if ($image != "is-invalid") {

            $data = $_POST;

            $data['id'] = $id;
            $data['image'] = $image;
            $data['password'] = $password;
            $data['updated_at'] = date('Y-m-d');

            $repo->updateLivreur($data);
            unlink(base_url('/img/' . $livreur['image']));

            redirect('/admin/livreurs', "Le livreur à bien été Modifier");
        }
    }
}



view(
    name: 'admin.livreurs.update',
    pageTitle: "Edition du livreur",
    params: [
        'id' => $id,
        'livreur' => $livreur,
    ]
);
