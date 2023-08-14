<?php

class AdminRepository
{

    /**
     * Rétourne les information de l'admin
     * 
     * @param string $email l'email de l'admin
     */
    public function getAdmin($email){
        $stmt = db()->prepare("SELECT * FROM admin WHERE email = ?");
        $stmt->execute([$email]);

        $stmt->setFetchMode(PDO::FETCH_CLASS, Admin::class);

        return $stmt->fetch();
    }

    /**
     * Crée un nouveau compte adminnistrateur
     */
    public function createAdmin($email, $password){
        $stmt = db()->prepare("INSERT INTO admin (email, password) VALUES (:email, :password)");
        $stmt->execute([
            'email' => $email,
            'password' => $password
        ]);
    }
    /**
     * Recupère les prix de la date courant
     */

    public function getCurrent()
    {

        $sql = ("SELECT SUM(pc.prix) as revenuCurrent, COUNT(DISTINCT c.id) as nbCommande  FROM produits_commandes pc INNER JOIN commandes c ON c.id = pc.commande_id WHERE DATE(c.created_at) = DATE(NOW())");

        $stmt =  db()->query($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, Admin::class);

        $revenu = $stmt->fetch();
        return $revenu;
    }

    /**
     * Récupère les commandes livrées de la date courant
     */
    public function getLivrer()
    {
        $sql = ("SELECT COUNT(DISTINCT id) as nbLivrer FROM commandes WHERE statut = 'livrer' AND DATE(created_at) = DATE(NOW())");

        $stmt = db()->query($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, Admin::class);

        $nbLivrer = $stmt->fetch();

        return $nbLivrer;
    }

    /**
     * Récupere tout les prix des commandes
     */
    public function getRevenuTotal()
    {
        $sql = ("SELECT SUM(prix) as total FROM produits_commandes");

        $stmt = db()->query($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, Admin::class);

        $revenu =  $stmt->fetch();
        return $revenu;
    }
}
