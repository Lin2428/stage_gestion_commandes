<?php
require '../bootstrap.php';

if(!get_admin_connect()){
    header('Location: '. base_url('admin/login.php').'');
    exit;
   }

$repo = new AdminRepository();

if(is_post() && !empty($_POST['email'] && $_POST['password'])){
    if($repo->getAdmin($_POST['email'])){
       flash_message("Ce compte existe deja !", "danger");
    }else{
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $repo->createAdmin($_POST['email'], $password);
        flash_message("Le compte a bien été ajouté !");
        unset($_POST['email']);
        unset($_POST['password']);
    }
}

view(
    name: 'admin/create',
    pageTitle: 'Ajouter un compte',
    params: [

    ]
);