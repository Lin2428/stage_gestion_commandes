<?php
require '../../bootstrap.php';
if(!get_admin_connect()){
    header('Location: '. base_url('admin/login.php').'');
    exit;
   }

if (is_post() && !empty($_POST['id'])) {

    if (is_post() && !empty($_POST['id'])) {

        $id = $_POST['id'];

        $repos = new CategoryRepository();
        $categorie = $repos->findById($id);

        $statut = 0;
        if ($categorie->getStatut() === 0) {
            $statut = 1;
            flash_message("La categorie a bient été mise en ligne");
        } else {
            flash_message("La categorie a bien été mise hors ligne");
        }

        $repos->updateStatut($id, $statut);
        redirect("admin/categories/");
    }
}
