<?php

class LivreurRepository
{

    /**
     * Recupère tout les livreurs depuis la base de données
     * 
     * @return array
     */
    public function getAll()
    {
        $sql = "SELECT l.id, l.nom, l.prenom, l.email, l.tel, l.password, l.updated_at as updatedAt, l.created_at as createdAt, l.image FROM livreurs l";
        $stmt = db()->query($sql);

        $stmt->setFetchMode(PDO::FETCH_CLASS, Livreur::class);

        return $stmt->fetchAll();
    }

    /**
     * Recupère un livreur par id depuis la base de données
     * 
     * @param int $id l'id du livreur
     */
    public function findById($id)
    {
        $stmt = db()->prepare("SELECT l.id, l.nom, l.prenom, l.email, l.tel, l.password, l.updated_at as updatedAt, l.created_at as createdAt, l.image FROM livreurs l WHERE id = ?");
        $stmt->execute([$id]);

        $stmt->setFetchMode(PDO::FETCH_CLASS, Livreur::class);

        return $stmt->fetchAll();
    }

    /**
     * Ajoute un nouveau livreurs à la base de données 
     * 
     * @param string $nom le nom du livreur
     * @param string $prenom le prénom du livreur
     * @param string $email l'email du livreur
     * @param string $tel le tel du livreur
     * @param string $password le mot de passe du livreur
     * @param string $image l'image du du livreur
     */
    public function createLivreur($nom, $prenom, $email, $tel, $password, $image)
    {
        $sql = db()->prepare("INSERT into livreurs (nom, prenom, email, tel, password, image) VALUES (:nom, :prenom, :email, :tel, :password, :image)");
        $sql->execute([
            'nom' => $nom,
            'prenom' => $prenom,
            'email' => $email,
            'tel' => $tel,
            'password' => $password,
            'image' => $image
        ]);
    }

    /**
     * Modifie un livreur
     *
     * @param array $data les données à metter ajour
     */
    public function updateLivreur($data)
    {
        $sql = db()->prepare("UPDATE livreurs SET nom = :nom, prenom = :prenom, email = :email, tel = :tel, password = :password, image = :image, updated_at = :updated_at  WHERE id = :id");

        $sql->execute($data);
    }

    /**
     * Supprime un livreur
     * 
     * @param int $id l'id du livreur
     */
    public function deleteLivreur($id)
    {
        $sql = db()->prepare("DELETE FROM livreurs WHERE id = ?");
        $sql->execute([$id]);
    }

    /**
     * Récupère les livreurs et les place dans des option
     */
    public function getLivreurLookup()
    {
        $livreurs = $this->getAll();
        $options = [];

        foreach ($livreurs as $livreur) {
            $options[$livreur->getId()] = $livreur->getNom() .' '. $livreur->getPrenom();
        }

        return $options;
    }
}
