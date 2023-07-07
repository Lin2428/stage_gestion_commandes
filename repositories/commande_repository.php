<?php

class CommandeRepository
{
    /**
     * Recupère toute les commandes depuis la base données
     */
    public function getAll()
    {
        $sql = "SELECT cm.id, cm.numero, cm.adresse, cm.statut, cm.created_at as createdAt, c.nom as clientNom, c.prenom as clientPrenom, l.nom as livreurNom, l.prenom as livreurPrenom FROM commandes cm INNER JOIN clients c ON c.id = cm.client_id INNER JOIN livreurs l ON l.id = cm.livreur_id";
        $stmt = db()->query($sql);
        $data = $stmt->fetchAll();

        $data = Commande::parse($data);
        
        return $data;
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
    public function updateLivreurCommande($id, $livreur_id){
        $sql = db()->prepare("UPDATE commandes SET livreur_id = :livreur_id, updated_at = :updated_at WHERE id = :id");
        
        $sql->execute([
            'id' => $id,
            'livreur_id' => $livreur_id,
            'updated_at' => date('Y-m-d')
        ]);
    }
}
