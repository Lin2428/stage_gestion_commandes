<?php
class PanierRepository
{

    public static function getOrCreateCartId()
    {
        $visitorId = get_visitor_id();

        $stmt = db()->prepare('SELECT id FROM paniers WHERE id_client = ?');
        $stmt->execute([$visitorId]);

        $panierId = $stmt->fetchColumn();

        if (!$panierId) {
            $pdo = db();
            $stmt = $pdo->prepare('INSERT INTO paniers(id_client) VALUE (?)');
            $stmt->execute([$visitorId]);

            $panierId = $pdo->lastInsertId();
        }

        return $panierId;
    }

    /**
     * Récupère l'id du panier depuis la base de donné
     * @param string $clientId l'id du client
     * 
     * @return int l'id du panier
     */
    public function getIdPanger($clientId)
    {
        $sql = "SELECT id FROM paniers WHERE id_client = '$clientId'";
        $stmt = db()->query($sql);
        $idPanier = $stmt->fetchColumn();

        return $idPanier;
    }

    /**
     * Récupère la quantité d'un produit si il existe et
     * incrémente de un (1) sinon il renvoi false
     * 
     * @param int $produitId l'id du produit
     * 
     * @return array
     */
    public function getOrAddCountProduit($produitId)
    {
        $stmt = db()->prepare("SELECT id, quantite FROM panier_items WHERE produit_id = ?");
        $stmt->execute([$produitId]);

        $data = $stmt->fetch();
        return $data;
    }

    /**
     * Ajoute un élément dans le panier
     * @param int|null $produitId l'id du produit
     * 
     * @return bool 
     */
    public function add($produitId): bool
    {
        try {

            $stmt = db()->prepare('INSERT INTO panier_items (panier_id, produit_id, quantite) VALUE (:panier_id, :produit_id, 1)');
            $stmt->execute([
                'panier_id' => static::getOrCreateCartId(),
                'produit_id' => $produitId,
            ]);

            return true;
        } catch (PDOException $e) {
            dd($e);
        }

        return false;
    }

    /**
     * Modifie la quantité du produit
     * 
     * @param array $data
     */

     public function updateCountProduit($data)
     {
        $stmt = db()->prepare("UPDATE panier_items SET quantite = :quantite WHERE id = :id");
        $stmt->execute($data);
     }

    /**
     * Rétourne les produit d'un panier
     */
    public function getAll()
    {
        $panierId = $this->getOrCreateCartId();
        $sql = "SELECT ip.id as itemId, ip.produit_id as produitId, ip.quantite, p.nom as produitNom, p.prix as produitPrix, p.image as produiImage FROM  panier_items ip INNER JOIN produits p ON p.id = ip.produit_id WHERE ip.panier_id = $panierId";
        $stmt = db()->query($sql);

        $stmt->setFetchMode(PDO::FETCH_CLASS, Panier::class);

        return $stmt->fetchAll();
    }


    /**
     * Supprime un iteme du panier
     * 
     * @param int $id l'id de l'item
     */
    public function delete($id)
    {
        $stmt = db()->prepare("DELETE FROM panier_items WHERE id = ?");
        $stmt->execute([$id]);
    }

    public function getPrixTotal()
    {
        $currentCart = static::getOrCreateCartId();
        $stmt = db()->prepare("SELECT SUM(p.prix * pi.quantite) FROM panier_items pi INNER JOIN produits p ON p.id = pi.produit_id WHERE pi.panier_id = ?");
        $stmt->execute([$currentCart]);
        
        $total = $stmt->fetchColumn();

        return $total;
    }

    /**
     * Récupère le nombre des produit d'un panier
     * 
     * @return int
     */
    public static function getItemCount()
    {
        $currentCart = static::getOrCreateCartId();

        $stmt = db()->query('SELECT COUNT(*) as total FROM panier_items  WHERE panier_id = ' . $currentCart);

        return $stmt->fetchColumn();
    }

}
