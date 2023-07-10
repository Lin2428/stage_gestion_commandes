<?php
require '../../bootstrap.php';

if (is_post() && !empty($_POST['id'])) {

    if (is_post() && !empty($_POST['id'])) {

        $id = $_POST['id'];

        $repos = new CategoryRepository();
        $categorie = $repos->findById($id);

        $statut = 0;
        if ($categorie[0]->getStatut() === 0) {
            $statut = 1;
            flash_message("La categorie a bient été mise en ligne");
        } else {
            flash_message("La categorie a bien été mise hors ligne");
        }

        $repos->updateStatut($id, $statut);
        redirect("admin/categories/");
    }
}
