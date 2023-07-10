<?php
require '../../bootstrap.php';

if (is_post() && !empty($_POST['id'])) {
    $id = $_POST['id'];

    $repos = new LivreurRepository();
    $livreur = $repos->findById($id);

    $statut = 0;
    if ($livreur[0]->getStatut() === 0) {
        $statut = 1;
        flash_message("Le livreur a bien été mise en ligne");
    } else {
        flash_message("Le livreur a bien été mise hors ligne");
    }

    $repos->updateStatut($id, $statut);
    redirect("admin/livreurs/");
}
