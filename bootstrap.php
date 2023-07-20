<?php
session_start();

require 'vendor/autoload.php';
require 'constant.php';

include ROOT . 'db.php';
include ROOT . 'functions.php';

model('admin.model.php');
model('produit.model.php');
model('category.model.php');
model('client.model.php');
model('livreur.model.php');
model('commande.model.php');
model('produit_commande.model.php');
model('panier.model.php');

// Repositories
include_repo('product_repository.php');
include_repo('categorie_repository.php');
include_repo('livreur_repository.php');
include_repo('client_repository.php');
include_repo('commande_repository.php');
include_repo('admin_repository.php');
