<?php
require '../../bootstrap.php';

if(!get_admin_connect()){
    header("Location: ../login.php");
    exit;
}

$repo = new LivreurRepository();

if (is_post()) {
    if (!empty($_POST['nom'] && $_POST['prenom'] && $_POST['email'] && $_POST['tel'] && $_POST['password'])) {
        $image = '';
        if (!empty($_FILES)) {
            $image = uploadImage();
        }
        if ($image != "is-invalid") {
            $livreurs = $repo->createLivreur(
                nom: $_POST['nom'],
                prenom: $_POST['prenom'],
                email: $_POST['email'],
                tel: $_POST['tel'],
                password: $_POST['password'],
                image: $image
            );

            redirect('/admin/livreurs', "le livreur a bien été enrégistré");
        }
    }
}

view(
    name: 'admin.livreurs.create',
    pageTitle: "Ajouter un livreur",
    params: []
);
