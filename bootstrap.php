<?php
session_start();

require 'constant.php';

include ROOT . 'db.php';
include ROOT . 'functions.php';


require ROOT . 'models' . DS .'produit.model.php';

// Repositories
include_repo('product_repository.php');
include_repo('categorie_repository.php');
include_repo('livreur_repository.php');
include_repo('client_repository.php');
include_repo('commande_repository.php');
