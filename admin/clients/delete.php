<?php
require '../../bootstrap.php';

if (is_post() && !empty($_POST['id'])) {

    // $repo = new ClientRepository();
    // $repo->deleteClient($_POST['id']);

    redirect('admin/livreurs/', "Le livreur a bient été désactivé");
} else {
    redirect('admin/livreurs/', "Il ne s'est rien passé", "danger");
}