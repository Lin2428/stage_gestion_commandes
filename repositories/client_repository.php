<?php

class ClientRepository
{

    /**
     * Récupère le nombre de clients
     */
    public function getCount()
    {
        $sql = "SELECT COUNT(*) FROM clients";
        $stmt = db()->query($sql);
        $count = $stmt->fetchColumn();

        return $count;
    }

    /**
     * Recupère tout les clients depuis la base de données
     * 
     * @return array
     */
    public function getAll($page, $perPage, array $filters = [])
    {
        $sql = "SELECT c.id, c.nom, c.prenom, c.email, c.tel, c.password, c.created_at as createdAt, updated_at as updatedAt, statut FROM clients c";
        
        $search = $filters['search'] ?? null;

        if(!empty($search)){
            $sql .= " WHERE c.nom LIKE :search OR c.email LIKE :search OR c.tel LIKE :search ";
        }
        
        $sql .= " LIMIT :l OFFSET :o";

        $stmt = db()->prepare($sql);
        $offset = ($page - 1) * $perPage;
        $stmt->bindParam('l', $perPage, PDO::PARAM_INT);
        $stmt->bindParam('o', $offset, PDO::PARAM_INT);

        if(!empty($search)){
            $search = "%$search%";
            $stmt->bindParam('search', $search);
        }
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_CLASS, Client::class);
        $client = $stmt->fetchAll();

        return  $client;
    }

    /**
     * Recupère un client par id depuis la base de données
     * 
     * @param int $id l'id du client
     */
    public function findById($id)
    {
        $stmt = db()->prepare("SELECT c.id, c.nom, c.prenom, c.email, c.tel, c.created_at, c.updated_at, statut FROM clients c WHERE c.id = ?");
        $stmt->execute([$id]);

        $stmt->setFetchMode(PDO::FETCH_CLASS, Client::class);
        
        return $stmt->fetch();
    }

    /**
     * Ajoute un nouveau client à la base de données 
     * 
     * @param string $nom le nom du client
     * @param string $prenom le prénom du client
     * @param string $email l'email du client
     * @param string $tel le tel du client
     * @param string $password le mot de passe du client
     * @param string $updated_at la derniere modification du client
     */
    public function createClient($nom, $prenom, $email, $tel, $password, $updated_at)
    {
        $sql = db()->prepare("INSERT into clients (nom, prenom, email, tel, password, updated_at) VALUES (:nom, :prenom, :email, :tel, :password, :updated_at)");
        $sql->execute([
            'nom' => $nom,
            'prenom' => $prenom,
            'email' => $email,
            'tel' => $tel,
            'password' => $password,
            'updated_at' => $updated_at
        ]);
    }

    /**
     * Modifie un produit
     * 
     * @param int $id l'id du client
     * @param string $prenom le prénom du client
     * @param string $email l'email du client
     * @param string $tel le tel du client
     * @param string $password le mot de passe du client
     */
    public function updateClient($id, $nom, $prenom, $email, $tel, $password)
    {
        $sql = db()->prepare("UPDATE clients SET nom = :nom, prenm = :prenom, email = :email, tel = :tel, password = :password WHERE id = :id");

        $sql->execute([
            'id' => $id,
            'nom' => $nom,
            'prenom' => $prenom,
            'email' => $email,
            'tel' => $tel,
            'password' => $password
        ]);
    }

    /**
     * Supprime un client
     * 
     * @param int $id l'id du client
     */
    public function deleteClient($id)
    {
        $sql = db()->prepare("DELETE FROM clients WHERE id = ?");
        $sql->execute([$id]);
    }

    /**
     * Met ajour le status d'un client
     * 
     * @param int $id l'id du client
     */

     public function updateStatut($id, $statut)
     {
         $sql = db()->prepare("UPDATE clients SET statut = :statut WHERE id = :id");
 
         $sql->execute([
             'id' => $id,
             'statut' => $statut,
         ]);
     }
}
