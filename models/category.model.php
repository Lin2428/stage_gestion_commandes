<?php

class Category
{
    private $id;
    private $nom;
    private $statut;
    private $image;
    private $inCategory = false;

    public function getId(): int
    {
        return $this->id;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getStatut(): int
    {
        return $this->statut;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setInCategory(bool $inCategory)
    {
        $this->inCategory = $inCategory;
    }

    public function isCategory()
    {
        return $this->inCategory;
    }
}
