<?php
require 'bootstrap.php';

$id = intval($_GET['del']);

$repo = new PanierRepository();

if($id){
    dump($id);
    $repo->delete($id);
    
    header('Location:'. base_url('/panier.php'));
    die;
}else{
    header('Location:'. base_url('/panier.php'));
    die; 
}