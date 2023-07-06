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
            $image = $livreur['image'];
        }

        if (!empty($_POST['password'])) {
            $password = $_POST['password'];
        } else {
            $password = $livreur['password'];
        }

        if ($image != "is-invalid") {

            $repo->updateLivreur(
                id: $id,
                nom: $_POST['nom'],
                prenom: $_POST['prenom'],
                email: $_POST['email'],
                tel: $_POST['tel'],
                password: $password,
                image: $image
            );
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
