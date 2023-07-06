<?php

class ClientRepository
{

    /**
     * Recupère tout les clients depuis la base de données
     * 
     * @return array
     */
    public function getAll()
    {
        $sql = "SELECT c.id, c.nom, c.prenom, c.email, c.tel, c.created_at, c.updated_at FROM clients c";
        $stmt = db()->query($sql);

        return $stmt->fetchAll();
    }

    /**
     * Recupère un client par id depuis la base de données
     * 
     * @param int $id l'id du client
     */
    public function findById($id)
    {
        $stmt = db()->prepare("SELECT c.id, c.nom, c.prenom, c.email, c.tel, c.created_at, c.updated_at FROM clients c WHERE c.id = ?");
        $stmt->execute([$id]);

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
}
