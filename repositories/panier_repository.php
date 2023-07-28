<?php
class PanierRepository
{

    /**
     * Récupère ou crée l'id du pagnet du visiteur
     */
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
     * Récupère la quantité d'un produit si il existe 
     * 
     * @param int $produitId l'id du produit
     * 
     * @return array
     */
    public function getOrAddCountProduit($produitId)
    {
        $currentCart = static::getOrCreateCartId();
        $stmt = db()->prepare("SELECT pi.id, pi.quantite FROM paniers p INNER JOIN panier_items pi ON pi.panier_id = p.id  WHERE pi.produit_id = :produit_id AND p.id = :panier_id");
        $stmt->execute([
          'produit_id' => $produitId,
          'panier_id' => $currentCart,
        ]);

        $data = $stmt->fetch();

        return $data;
    }

    /**
     * Ajoute un élément dans le panier
     * @param int|null $produitId l'id du produit
     * @param int $quantite la quantite à ajouté
     * 
     * @return bool 
     */
    public function add($produitId, $quantite): bool
    {
        try {

            $stmt = db()->prepare('INSERT INTO panier_items (panier_id, produit_id, quantite) VALUE (:panier_id, :produit_id, :quantite)');
            $stmt->execute([
                'panier_id' => static::getOrCreateCartId(),
                'produit_id' => $produitId,
                'quantite' => $quantite
            ]);

            return true;
        } catch (PDOException $e) {
            dump($e);
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
