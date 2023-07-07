<?php

class ProduitCommande
{
    private $id;
    private $prix;
    private $quantite;
    private $produitId;
    private $commandeId;
    private $nomProduit;


    public function getId(): int 
    {
        return $this->id;
    }

    public function getPrix(): int 
    {
        return $this->prix;
    }

    public function getQuantite(): int
    {
        return $this->quantite;
    }

    public function getProduitId(): int 
    {
        return $this->produitId;
    }

    public function getCommandeId(): int 
    {
        return $this->commandeId;
    }

    public function getNomProduit(): string 
    {
        return $this->nomProduit;
    }

}