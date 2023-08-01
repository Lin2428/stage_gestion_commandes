<?php
require 'bootstrap.php';
$repo = new ClientRepository();
$lastId = $repo->getLastId();

if(is_post()){
    if(!empty($_POST['nom'] && $_POST['tel'] && $_POST['password'])){
        if(strlen($_POST['tel']) === 9){
            $data = $_POST;
            $data['id'] = $lastId + 1;
            $data['statut'] = 1;
  
            $repo->createClient($data);
        }  
    }
}

view(
    name: 'create',
    pageTitle: "Créer un compte",
    layout: "front",
    params: [
        
    ]
);