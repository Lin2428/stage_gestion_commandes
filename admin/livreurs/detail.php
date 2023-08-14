<?php
require '../../bootstrap.php';
if(!get_admin_connect()){
    header("Location: ../login.php");
    exit;
   }
$id = $_GET['id'];

$repository = new LivreurRepository();
$livreur = $repository->findById($id);


view(
    name: 'admin.livreurs.detail',
    pageTitle: "Détails du livreur",
    params: [
        'livreur' => $livreur,
    ]
);