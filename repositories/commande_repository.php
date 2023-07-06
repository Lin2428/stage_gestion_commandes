<?php

class CommandeRepository
{
    /**
     * Recupère toute les commandes depuis la base données
     */
    public function getAll()
    {
        $sql = "SELECT cm.id, cm.numero, cm.adresse, cm.statut, cm.created_at, cm.updated_at, cl.nom as nom_client, cl.prenom as prenom_client, lv.nom as nom_livreur, lv.prenom as prenom_livreur FROM commandes cm INNER JOIN clients cl ON cm.client_id = cl.id INNER JOIN livreurs lv ON cm.livreur_id = lv.id";
        $stmt = db()->query($sql);

        return $stmt->fetchAll();
    }

    /**
     * Recupère les information d'une commande depuis la base données
     * 
     * @param $id l'id de la commande
     */
    public function finById($id)
    {
        $stmt = db()->prepare("SELECT cm.id, cm.numero, cm.adresse, cm.statut, cm.created_at, cm.updated_at, cl.nom as nom_client, cl.prenom as prenom_client, cl.email as email_client, cl.tel as tel_client, lv.nom as nom_livreur, lv.prenom as prenom_livreur, lv.tel as tel_livreur, lv.email as email_livreur, lv.id as id_livreur FROM commandes cm INNER JOIN clients cl ON cm.client_id = cl.id INNER JOIN livreurs lv ON cm.livreur_id = lv.id WHERE cm.id = ?");
        $stmt->execute([$id]);

        return $stmt->fetch();
    }

    /**
     * Recupère les produits, les prix et la quantité d'une commande
     * 
     * @param $id l'id de la commande
     */
    public function getArticleById($id)
    {
        $stmt = db()->prepare("SELECT pc.prix, pc.quantite, p.nom as nom_produit  From produits_commandes pc INNER JOIN produits p ON p.id = pc.produit_id WHERE pc.commande_id = ?");
        $stmt->execute([$id]);

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
