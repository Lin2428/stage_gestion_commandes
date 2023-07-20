<?php

class Panier
{
    private $id;
    private $quantite;

    /**
     * Défini la session si elle n'exite pas déja
     */
    public function __construct(){
        if(!isset($_SESSION)){
            session_start();
        }

        if(!isset($_SESSION['panier'])){
            $_SESSION['panier'] = [];
        }
    }

    /**
     * Ajoute un produit au panier
     */
    public function add($id){
        $_SESSION['panier'][$id] = 1;
    }
}