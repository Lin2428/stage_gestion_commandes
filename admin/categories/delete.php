<?php
require '../../bootstrap.php';

if (is_post() && !empty($_POST['id'])) {

    // $delete = new CategoryRepository();
    // $delete->deleteCategory($_POST['id']);
    
redirect("admin/categories/", "La catégorie a bien été désactivé");
} else {
    redirect("admin/categories/", "Il ne s'est rien passé");
}

