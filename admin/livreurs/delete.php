<?php
require '../../bootstrap.php';

if (is_post() && !empty($_POST['id'])) {

    $repo = new LivreurRepository();
    $repo->deleteLivreur($_POST['id']);

    redirect('admin/livreurs/', "Le livreur a bient été supprimé");
} else {
    redirect('admin/livreurs/', "Il ne s'est rien passé", "danger");
}
