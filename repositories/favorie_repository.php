<?php
class FavorieRepository
{
    /**
     * Récupère ou crée l'id de favorie du visiteur
     */
    public static function getOrCreateFavorieId()
    {
        $visitorId = get_visitor_id();

        $stmt = db()->prepare('SELECT id FROM favories WHERE client_id = ?');
        $stmt->execute([$visitorId]);

        $favorieId = $stmt->fetchColumn();

        if (!$favorieId) {
            $pdo = db();
            $stmt = $pdo->prepare('INSERT INTO favories(client_id) VALUE (?)');
            $stmt->execute([$visitorId]);

            $favorieId = $pdo->lastInsertId();
        }

        return $favorieId;
    }

    /**
     * Récupère l'id de la liste de favorie depuis la base de donné
     * @param string $clientId l'id du client
     * 
     * @return int l'id la liste de favorie
     */
    public function getIdProduit($produit)
    {
        $favorieId = static::getOrCreateFavorieId();
        $db = db();
        $stmt = $db->prepare("SELECT fi.id FROM favories f INNER JOIN favorie_items fi ON fi.favorie_id = f.id WHERE f.id = :favorie_id AND fi.produit_id = :produit_id");
        $stmt->execute([
            'favorie_id' => $favorieId,
            'produit_id' => $produit,
        ]);
        $idFavorie = $stmt->fetchColumn();
        return $idFavorie;
    }

    /**
     * Ajoute un élément dans la liste des favorie
     * @param int|null $produitId l'id du produit
     * 
     * @return bool 
     */
    public function add($produitId): bool
    {
        try {

            $stmt = db()->prepare('INSERT INTO favorie_items (favorie_id, produit_id) VALUE (:favorie_id, :produit_id)');
            $stmt->execute([
                'favorie_id' => static::getOrCreateFavorieId(),
                'produit_id' => $produitId,
            ]);

            return true;
        } catch (PDOException $e) {
            dump($e);
        }

        return false;
    }

    public function getAll()
    {
        $favorieId = static::getOrCreateFavorieId();

        $stmt = db()->prepare("SELECT fi.id as itemId, fi.produit_id as produitId, fi.created_at as createdAt, p.nom as produitNom, p.prix as produitPrix, p.image as produitImage FROM  favorie_items fi INNER JOIN produits p ON p.id = fi.produit_id WHERE fi.favorie_id = ? ");
        $stmt->execute([$favorieId]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, Favorie::class);

        $favories = $stmt->fetchAll();
        return $favories;
    }

    /**
     * Supprime un iteme de la liste de favorie
     * 
     * @param int $id l'id de l'item
     */
    public function delete($id)
    {
        $stmt = db()->prepare("DELETE FROM favorie_items WHERE id = ?");
        $stmt->execute([$id]);
    }

    /**
     * Récupère le nombre des produit d'un panier
     * 
     * @return int
     */
    public static function getItemCount()
    {
        $currentCart = static::getOrCreateFavorieId();

        $stmt = db()->query('SELECT COUNT(*) as total FROM favorie_items  WHERE favorie_id = ' . $currentCart);

        return $stmt->fetchColumn();
    }

    /**
     * Récupère le nombre des produit d'un panier
     * 
     * @return array
     */
    public static function getItemFavorie()
    {
        $currentCart = static::getOrCreateFavorieId();

        $stmt = db()->query('SELECT produit_id as id FROM favorie_items  WHERE favorie_id = ' . $currentCart);

        return $stmt->fetchAll();
    }
}
