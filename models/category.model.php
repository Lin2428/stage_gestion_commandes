<?php

class Category
{
    private $id;
    private $nom;

    public function getId(): int
    {
        return $this->id;
    }

    public function getNom(): string
    {
        return $this->nom;
    }
}
