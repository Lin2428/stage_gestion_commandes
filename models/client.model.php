<?php

class Client
{
    private $id;
    private $nom;
    private $prenom;
    private $email;
    private $tel;
    private $password;
    private $createdAt;
    private $updatedAt;

    public static function parse($data): self
    {
        $c = new Client();
        $c->id = $data['clientId'];
        $c->nom = $data['clientNom'];
        $c->prenom = $data['clientPrenom'];
        $c->email = $data['clientEmail'];
        $c->tel = $data['clientTel'];
        return $c;
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

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}