<?php

class ClientRepository
{

    /**
     * Recupère tout les livreurs depuis la base de données
     * 
     * @return array
     */
    public function getAll()
    {
        $sql = "SELECT l.id, l.nom, l.prenom, l.email, l.tel, l.updated_at, l.image FROM livreurs l";
        $stmt = db()->query($sql);

        return $stmt->fetchAll();
    }

    /**
     * Recupère un livreur par id depuis la base de données
     * 
     * @param int $id l'id du livreur
     */
    public function findById($id)
    {
        $stmt = db()->prepare("SELECT * FROM livreurs WHERE id = ?");
        $stmt->execute([$id]);

        return $stmt->fetch();
    }

    /**
     * Ajoute un nouveau livreurs à la base de données 
     * 
     * @param string $nom le nom du livreur
     * @param string $prenom le prénom du livreur
     * @param string $email l'email du livreur
     * @param string $tel le tel du livreur
     *  @param string $password le mot de passe du livreur
     */
    public function createClient($nom, $prenom, $email, $tel)
    {
        $sql = db()->prepare("INSERT into livreurs (nom, prenom, email, tel) VALUES (:nom, :prenom, :email, :tel)");
        $sql->execute([
            'nom' => $nom,
            'prrenom' => $prenom,
            'email' => $email,
            'tel' => $tel
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
