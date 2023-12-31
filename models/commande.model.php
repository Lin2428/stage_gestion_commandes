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
    private $total = null;

    

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
        if($this->statut === "passer"){
            return "Commande non traité";
        }
        else if($this->statut === "traiter"){
            return "Commande traité";
        }
        else if($this->statut === "livraison"){
            return "En cours de livraison";
        }
        else if($this->statut === "livrer"){
            return "Commande livrée";
        }
        return "Commande annulée";
    }

    public function getCreatedAt()
    {
        return date_format(date_create($this->createdAt), 'd/m/Y à h:i');
    }

    public function getUpdatedAt()
    {
        return date_format(date_create($this->updatedAt), 'd/m/Y à h:i');
    }

    public function getClientId(): int
    {
        return $this->clientId;
    }

    public function getLivreurId(): ?int
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

    public function setTotal(int $total){
        $this->total = $total;
    }

    public function getTotalPrix(){
        return number_format($this->total, 0, thousands_separator: " ")." XAF";
    }
}