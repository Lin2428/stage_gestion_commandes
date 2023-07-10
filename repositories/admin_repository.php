<?php

class AdminRepository
{
    /**
     * Recupère les prix de la date courant
     */

    public function getCurrentRevenu()
    {
        $date = date("Y-m-d");
        $stmt = db()->prepare("SELECT prix FROM produits_commandes WHERE created_at = ?");

        $stmt->execute([$date]);

        $revenu =  $stmt->fetchAll();
        return $revenu;
    }

    /**
     * Récupère les commandes de la date courant
     */
    public function getCurrentCommandes()
    {
        $date = date("Y-m-d");
        $stmt = db()->prepare("SELECT statut FROM commandes WHERE created_at = ?");

        $stmt->execute([$date]);

        $commande =  $stmt->fetchAll();
        return $commande;
    }

    /**
     * Récupere tout les prix des commandes
     */
    public function getRevenuTotal()
    {
        $stmt = db()->prepare("SELECT prix FROM produits_commandes");

        $stmt->execute();

        $revenu =  $stmt->fetchAll();
        return $revenu;
    }
}
