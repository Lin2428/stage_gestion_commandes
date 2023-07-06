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

    public function getImage(): string
    {
        return $this->image;
    }

    public function getStock()
    {
        return $this->stock;
    }

    public function getDescription()
    {
        return $this->description;
    }
}
