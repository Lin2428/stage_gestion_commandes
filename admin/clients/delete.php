<?php
require '../../bootstrap.php';
if(!get_admin_connect()){
    header('Location: '. base_url('admin/login.php').'');
    exit;
   }

if (is_post() && !empty($_POST['id'])) {

    $id = $_POST['id'];

    $repos = new ClientRepository();
    $client = $repos->findById($id);

    $statut = 0;
    if ($client->getStatut() === 0) {
        $statut = 1;

        flash_message("le client a bient été mis en ligne");
    } else {

        flash_message("le client a bient été mis hors ligne");
    }

    $repos->updateStatut($id, $statut);

    redirect('admin/clients/');
}
