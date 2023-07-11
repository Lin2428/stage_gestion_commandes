<?php

class Admin
{
    private $revenuCurrent;
    private $nbCommande;
    private $nbLivrer;
    private $total;

    public function getCurrentRevenu(): ?int
    {
        return $this->revenuCurrent;
    }

    public function getNbCommandes(): ?int
    {
        return $this->nbCommande;
    }

    public function getNbLivrer(): ?int
    {
        return $this->nbLivrer;
    }

    public function getTotal(): ?int
    {
        return $this->total;
    }

    
}