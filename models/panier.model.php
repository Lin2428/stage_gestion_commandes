<?php

class Panier
{
    private $id;
    private $itemId;
    private $produitId;
    private $produitNom;
    private $produitPrix;
    private $produiImage;
    private $clientId;
    private $quantite;

    public function getId(): ?int 
    {
        return $this->id;
    }

    public function getItemId(): ?int 
    {
        return $this->itemId;
    }

    public function getProduitId(): ?int 
    {
        return $this->produitId;
    }

    public function getProduitNom(): ?string 
    {
        return $this->produitNom;
    }

    public function getProduitPrix()
    {
        return number_format($this->produitPrix, 0, thousands_separator: " ")." XAF";
    }

    public function getProduitImage(): ?string
    {
        return $this->produiImage;
    }

    public function getClientId(): ?string
    {
        return $this->clientId;
    }

    public function getQuantite(): ?int 
    {
        return $this->quantite;
    }

    public function getTotal()
    {
        $total = $this->quantite * $this->produitPrix;
        return number_format($total, 0, thousands_separator: " ")." XAF";
    }
}