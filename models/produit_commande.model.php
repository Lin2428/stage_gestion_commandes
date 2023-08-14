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

    public function getPrix()
    {
        return number_format($this->prix, 0, thousands_separator: " ")." XAF";
    }

    public function getQuantite()
    {
        return number_format($this->quantite, 0, thousands_separator: " ");
    }

    public function getProduitId(): int 
    {
        return $this->produitId;
    }

    public function getCommandeId(): int 
    {
        return $this->commandeId;
    }

    public function getNomProduit(): ?string 
    {
        return $this->nomProduit;
    }

    public function getTotal()
    {
        $total = $this->quantite * $this->prix;
        return number_format($total, 0, thousands_separator: " ")." XAF";
    }

}