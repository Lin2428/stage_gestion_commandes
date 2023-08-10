<?php
require '../../bootstrap.php';
if(!get_admin_connect()){
    header('Location: '. base_url('admin/login.php').'');
    exit;
   }
$id = $_GET['id'];

$repo = new CommandeRepository();
$commande = $repo->findById($id);

$articles = $repo->getArticleById($commande->getId());

$total = $repo->getPrixTotal($commande->getId());
$commande->setTotal($total);


view(
    name: 'admin.commandes.detail',
    pageTitle: "Details de la commande",
    params: [
        'commande' => $commande,
        'articles' => $articles,
        'total' => "$total",
    ]
);