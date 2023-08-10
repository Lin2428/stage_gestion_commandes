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
    public function getAll($page, $perPage, array $filters = [])
    {
        $sql = "SELECT cm.id, cm.numero, cm.adresse, cm.statut, cm.created_at as createdAt, cm.updated_at as updatedAt, cm.client_id as clientId, cm.livreur_id as livreurId, c.nom as clientNom, c.prenom as clientPrenom, c.tel as clientTel, c.email as clientEmail, l.nom as livreurNom, l.prenom as livreurPrenom, l.tel as livreurTel, l.email as livreurEmail  FROM commandes cm INNER JOIN clients c ON c.id = cm.client_id INNER JOIN livreurs l ON l.id = cm.livreur_id ";

        $statut = $filters['statut'] ?? null;

        $whereAdded = false;

        if (!empty($statut)) {
            $whereAdded = true;
            $sql .= " WHERE cm.statut = :statut ";
        }

        $search = $filters['search'] ?? null;
        if (!empty($search)) {
            if (!$whereAdded) {
                $sql .= " WHERE ";
            } else {
                $sql .= " AND ";
            }

            $sql .= " (c.nom LIKE :search OR c.tel LIKE :search) ";
            $whereAdded = true;
        }

        $numero = $filters['numero'] ?? null;
        if (!empty($numero)) {
            if (!$whereAdded) {
                $sql .= " WHERE ";
            } else {
                $sql .= " AND ";
            }

            $sql .= " cm.numero LIKE :numero";
            $whereAdded = true;
        }

        $date = $filters['date'] ?? null;
        if (!empty($date)) {
            if (!$whereAdded) {
                $sql .= " WHERE ";
            } else {
                $sql .= " AND ";
            }

            $sql .= " (DATE(cm.created_at) = :date OR DATE(cm.updated_at) = :date)";
            $whereAdded = true;
        }

        $sql .= " LIMIT :l OFFSET :o";

        $stmt = db()->prepare($sql);

        $offset = ($page - 1) * $perPage;
        $stmt->bindParam('l', $perPage, PDO::PARAM_INT);
        $stmt->bindParam('o', $offset, PDO::PARAM_INT);

        if (!empty($statut)) {
            $stmt->bindParam('statut', $statut);
        }

        if (!empty($search)) {
            $search = "%$search%";
            $stmt->bindParam('search', $search);
        }

        if (!empty($numero)) {
            $numero = "%$numero%";
            $stmt->bindParam('numero', $numero);
        }

        if (!empty($date)) {
            $stmt->bindParam('date', $date);
        }

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
     * Récupère les commendes d'un client
     * 
     * @param bool $statut pour filtrer juste les commande en attente
     * 
     * @param array filtre pour filtrer par statut
     * 
     * @param int $id l'id du client
     */
    public function findCommande($id, $statut = false, $filtre = [])
    {
        $sql = "SELECT cm.id, cm.numero, cm.adresse, cm.statut, DATE(cm.created_at) as createdAt, cm.updated_at as updatedAt, cm.client_id as clientId, cm.livreur_id as livreurId FROM commandes cm  WHERE cm.client_id = ?";
        if ($statut) {
            $sql .= " AND (cm.statut = 'passer' OR cm.statut = 'traiter' OR cm.statut = 'livraison')";
        }

        if (!empty($filtre)) {
            $sql .= " AND (";

            $passer = $filtre['passer'] ?? null;
            $traiter = $filtre['traiter'] ?? null;
            $livraison = $filtre['livraison'] ?? null;
            $livrer = $filtre['livrer'] ?? null;
            $annuler = $filtre['annuler'] ?? null;

            $OR = false;

            if ($passer) {
                $sql .= " cm.statut = 'passer'";
                $OR = true;
            }

            if ($traiter) {
                if ($OR) {
                    $sql .= " OR ";
                }

                $sql .= " cm.statut = 'traiter' ";
                $OR = true;
            }

            if ($livraison) {
                if ($OR) {
                    $sql .= " OR ";
                }

                $sql .= " cm.statut = 'livraison' ";
                $OR = true;
            }

            if ($livrer) {
                if ($OR) {
                    $sql .= " OR ";
                }

                $sql .= " cm.statut = 'livrer' ";
                $OR = true;
            }

            if ($annuler) {
                if ($OR) {
                    $sql .= " OR ";
                }

                $sql .= " cm.statut = 'annuler' ";
                $OR = true;
            }

            $sql .= ")";
        }


        $stmt = db()->prepare($sql);
        $stmt->execute([$id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, Commande::class);
        $commande = $stmt->fetchall();


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
     * Récupère le nombre des commandes par rapport au statut
     * 
     * @param int $id l'id du client
     * @param string|null $statut le statut de la commande
     * 
     * @return int
     */

    public function getCountClient($id, $statut = null)
    {
        $sql = "SELECT COUNT(*) FROM commandes WHERE client_id = $id";

        if ($statut) {
            if ($statut === 'passer') {
                $sql .= " AND (statut = 'passer' OR statut = 'traiter' OR statut = 'livraison') ";
            } else {
                $sql .= " AND statut = '$statut'";
            }
        }
        $stmt = db()->query($sql);

        return $stmt->fetchColumn();
    }


    /**
     * Ajoute une commande dans la base de donnée
     * 
     * @param string $numero le numéro de la commande
     * @param string $adresse l'adresse de l'ivraison
     * @param int $id l'id du client
     */
    public function addCommande($numero, $adresse, $clientId)
    {
        $db = db();
        $sql = "INSERT INTO commandes (numero, adresse, client_id, livreur_id) VALUE(:numero, :adresse, :client_id, 1)";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            'numero' => $numero,
            'adresse' => $adresse,
            'client_id' => $clientId,
        ]);

        $idCommande = $db->lastInsertId();

        return $idCommande;
    }

    /**
     * Ajoute l'items d'une commande dans la base de donnée
     * 
     * @param int $prix le prix de l'item
     * @param int $quantite la quantité de l'item
     * @param int $produitId l'id du l'item
     * @param int $commandeId l'id de la commande
     */
    public function addItemsCommande($prix, $quantite, $produitId, $commandeId)
    {

        $sql = "INSERT INTO produits_commandes (prix, quantite, produit_id, commande_id) VALUE(:prix, :quantite, :produit_id, :commande_id)";
        $stmt = db()->prepare($sql);
        $stmt->execute([
            'prix' => $prix,
            'quantite' => $quantite,
            'produit_id' => $produitId,
            'commande_id' => $commandeId,
        ]);
    }

    /**
     * Modifie le livreur d'une commande
     * 
     * @param $id l'id de la commande
     * 
     * @param $livreur_id l'id du livreur
     */
    public function updateCommande($id, $livreur_id, $statut)
    {
        $sql = db()->prepare("UPDATE commandes SET statut = :statut, livreur_id = :livreur_id, updated_at = CURRENT_TIMESTAMP() WHERE id = :id");

        $sql->execute([
            'id' => $id,
            'livreur_id' => $livreur_id,
            'statut' => $statut
        ]);
    }

    /**
     * Retourne le prix total d'une commande
     * 
     * @param int $commandeId l'id de la commande
     * 
     * @return int
     */
    public function getPrixTotal($commandeId)
    {

        $stmt = db()->prepare("SELECT SUM(pc.prix * pc.quantite) FROM produits_commandes pc WHERE pc.commande_id = ?");
        $stmt->execute([$commandeId]);

        $total = $stmt->fetchColumn();

        return (int) $total;
    }


/**
     * Retourne le dépence total d'une client
     * @param int $commandeId l'id de la commande
     * 
     * @return int
     */
    public function getDepence($clientId)
    {

        $stmt = db()->prepare("SELECT SUM(pc.prix * pc.quantite) as prix FROM produits_commandes pc INNER JOIN commandes c ON c.id = pc.commande_id WHERE c.client_id = ?");
        $stmt->execute([$clientId]);

        return (int) $stmt->fetchColumn();
    }
}
