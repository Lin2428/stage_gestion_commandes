<?php

class Favorie
{
    private $id;

    /**
     * Défini la session si elle n'exite pas déja
     */
    public function __construct()
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        if (!isset($_SESSION['favorie'])) {
            $_SESSION['favorie'] = [];
        }
    }

    /**
     * Verifie si un produit est dans le tableau des favorie
     */
    public function getFavorie($id) : bool
    {
        if(!empty($_SESSION['favorie'][$id])){
            return true;
        }
        return false;  
    }

    /**
     * Ajoute un produit au favorie
     */
    public function add($id)
    {
        $_SESSION['favorie'][$id] = 1;
    }

    /**
     * Supprime un produit au favorie
     */
    public function delete($id)
    {
        unset($_SESSION['favorie'][$id]);
    }
}