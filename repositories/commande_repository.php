<?php

class CommandeRepository
{

    /**
     * Récupère le nombre des commandes
     */
    public function getCount()
    {
        $sql = "SELECT COUNT(*) as nb_commande FROM commandes";
        $stmt = db()->query($sql);
        $count = $stmt->fetchColumn();

        return $count;
    }
    /**
     * Recupère toute les commandes depuis la base données
     * @param int $premier le premier nombre de la limite
     * @param int $nombre le nombre de commante à récuperer
     */
    public function getAll($page, $perPage)
    {
        $stmt = db()->prepare("SELECT cm.id, cm.numero, cm.adresse, cm.statut, cm.created_at as createdAt, cm.updated_at as updatedAt, cm.client_id as clientId, cm.livreur_id as livreurId, c.nom as clientNom, c.prenom as clientPrenom, c.tel as clientTel, c.email as clientEmail, l.nom as livreurNom, l.prenom as livreurPrenom, l.tel as livreurTel, l.email as livreurEmail  FROM commandes cm INNER JOIN clients c ON c.id = cm.client_id INNER JOIN livreurs l ON l.id = cm.livreur_id LIMIT :l OFFSET :o");
        
        $offset = ($page - 1) * $perPage;
        $stmt->bindParam('l', $perPage, PDO::PARAM_INT);
        $stmt->bindParam('o', $offset, PDO::PARAM_INT);
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_CLASS, Commande::class);
        $commande = $stmt->fetchAll();

        return  $commande;
    }

    /**
     * Recupère les information d'une commande depuis la base données
     * 
     * @param $id l'id de la commande
     */
    public function findById($id)
    {
        $stmt = db()->prepare("SELECT cm.id, cm.numero, cm.adresse, cm.statut, cm.created_at as createdAt, cm.updated_at as updatedAt, cm.client_id as clientId, cm.livreur_id as livreurId, c.nom as clientNom, c.prenom as clientPrenom, c.tel as clientTel, c.email as clientEmail, l.nom as livreurNom, l.prenom as livreurPrenom, l.tel as livreurTel, l.email as livreurEmail  FROM commandes cm INNER JOIN clients c ON c.id = cm.client_id INNER JOIN livreurs l ON l.id = cm.livreur_id WHERE cm.id = ?");
        $stmt->execute([$id]);

        // $stmt->setFetchMode(PDO::FETCH_CLASS, Commande::class);

        $data = $stmt->fetch();
        $commande = Commande::parse($data);

        return $commande;
    }

    /**
     * Recupère les produits, les prix et la quantité d'une commande
     * 
     * @param $id l'id de la commande
     */
    public function getArticleById($commande)
    {
        $stmt = db()->query("SELECT pc.id, pc.prix, pc.quantite, p.id as produitId, p.nom as nomProduit, pc.commande_id as commandeId  FROM produits_commandes pc INNER JOIN produits p ON p.id = pc.produit_id WHERE commande_id = $commande");

        $stmt->setFetchMode(PDO::FETCH_CLASS, ProduitCommande::class);

        return $stmt->fetchAll();
    }

    /**
     * Modifie le livreur d'une commande
     * 
     * @param $id l'id de la commande
     * @param $livreur_id l'id du livreur
     */
    public function updateLivreurCommande($id, $livreur_id)
    {
        $sql = db()->prepare("UPDATE commandes SET livreur_id = :livreur_id, updated_at = :updated_at WHERE id = :id");

        $sql->execute([
            'id' => $id,
            'livreur_id' => $livreur_id,
            'updated_at' => date('Y-m-d')
        ]);
    }
}
