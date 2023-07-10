<?php

class Livreur
{
    private $id;
    private $nom;
    private $prenom;
    private $email;
    private $tel;
    private $password;
    private $createdAt;
    private $updatedAt;
    private $image;
    private $statut;

    public static function parse($data): self
    {
        $l = new Livreur();

        $l->id = $data['livreurId'];
        $l->nom = $data['livreurNom'];
        $l->prenom = $data['livreurPrenom'];
        $l->email = $data['livreurEmail'];
        $l->tel = $data['livreurTel'];
        return $l;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getPrenom(): string
    {
        return $this->prenom;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getTel(): string
    {
        return $this->tel;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): string
    {
        return $this->updatedAt;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function getStatut(): int
    {
        return $this->statut;
    }

}