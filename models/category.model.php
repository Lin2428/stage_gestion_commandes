<?php

class Category
{
    private $id;
    private $nom;
    private $statut;
    private $image;

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
}
