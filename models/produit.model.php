<?php

class Produit
{
    private $id;
    private $nom;
    private $prix;
    private $category;
    private $categoryId;
    private $image;
    private $stock;
    private $description;
    private $statut;

    private $inFavorite = false;

    public function getId(): int
    {
        return $this->id;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getPrix(): float
    {
        return $this->prix;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function getCategoryId(): int
    {
        return $this->categoryId;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function getStock(): int
    {
        return $this->stock;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getStatut(): int
    {
        return $this->statut;
    }

    public function setInFavorite(bool $inFavorite)
    {
        $this->inFavorite = $inFavorite;
    }

    public function isInFavorite()
    {
        return $this->inFavorite;
    }
}
