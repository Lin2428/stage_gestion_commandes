<?php

class Commande 
{
    private $id;
    private $numero;
    private $adresse;
    private $statut;
    private $createdAt;
    private $updatedAt;
    private $clientId;
    private $livreurId;

    /**
     * @var Client
     */
    private $client;

    /**
     * @var Livreur
     */
    private $livreur;


    public static function parse($data): Commande
    {
        $c = new Commande();

        $c->id = $data['id'];
        $c->numero = $data['numero'];
        $c->adresse = $data['adresse'];
        $c->statut = $data['statut'];
        $c->createdAt = $data['createdAt'];
        $c->updatedAt = $data['updatedAt'];
        $c->clientId = $data['clientId'];
        $c->livreurId = $data['livreurId'];


        $client = Client::parse($data);

        $c->client = $client;

        $livreur = Livreur::parse($data);

        $c->livreur = $livreur;

        return $c;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getNumero(): string
    {
        return $this->numero;
    }

    public function getAdresse(): string
    {
        return $this->adresse;
    }

    public function getStatut(): string
    {
        return $this->statut;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): string
    {
        return $this->updatedAt;
    }

    public function getClientId(): string
    {
        return $this->clientId;
    }

    public function getLivreurId(): string
    {
        return $this->livreurId;
    }

    /**
     * @return Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @return Livreur
     */
    public function getLivreur()
    {
        return $this->livreur;
    }
}