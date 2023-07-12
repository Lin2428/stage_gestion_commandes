<?php

class ProductRepository
{

    /**
     * Récupère le nombre de cproduits
     */
    public function getCount()
    {
        $sql = "SELECT COUNT(*) FROM produits";
        $stmt = db()->query($sql);
        $count = $stmt->fetchColumn();

        return $count;
    }


    /**
     * Recupère tout les produits depuis la base de données
     * 
     * @return array
     */
    public function getAll($page, $perPage, array $filters = [])
    {
        $sql = "SELECT p.id, p.nom, p.prix, p.stock, p.description, p.image, p.statut, c.nom as category, c.id as categoryId FROM produits p INNER JOIN categories c ON c.id = p.categorie_id";

        $statut = $filters['statut'] ?? "";

        $whereAdded = false;

        if (($statut == 1) || ($statut == 0)) {
            $whereAdded = true;
            $sql .= " WHERE p.statut = :statut ";
        }

        $search = $filters['search'] ?? null;
        if (!empty($search)) {
            if (!$whereAdded) {
                $sql .= " WHERE";
            } else {
                $sql .= " AND";
            }

            $sql .= " (p.id = :search OR p.prix = :search) ";
            $whereAdded = true;
        }

        $category = $filters['category'] ?? null;
        if (!empty($category)) {
            if (!$whereAdded) {
                $sql .= " WHERE";
            } else {
                $sql .= " AND";
            }

            $sql .= " p.categorie_id = :category";
            $whereAdded = true;
        }

        $nom = $filters['nom'] ?? null;
        if (!empty($nom)) {
            if (!$whereAdded) {
                $sql .= " WHERE";
            } else {
                $sql .= " AND ";
            }

            $sql .= " p.nom LIKE :nom";
            $whereAdded = true;
        }

        $sql .= " LIMIT :l OFFSET :o";


        $stmt = db()->prepare($sql);

        $offset = ($page - 1) * $perPage;
        $stmt->bindParam('l', $perPage, PDO::PARAM_INT);
        $stmt->bindParam('o', $offset, PDO::PARAM_INT);

        if (($statut == 1) || ($statut == 0)) {
            $stmt->bindParam('statut', $statut);
        }

        if (!empty($search)) {
            $stmt->bindParam('search', $search);
        }

        if (!empty($category)) {
            $stmt->bindParam('category', $category);
        }

        if (!empty($nom)) {
            $nom = "%$nom%";
            $stmt->bindParam('nom', $nom);
        }

        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_CLASS, Produit::class);
        $products = $stmt->fetchAll();

        return $products;
    }

    /**
     * Recupère un produit par id depuis la base de données
     * 
     * @param int $id l'id du produit
     */
    public function findById($id)
    {
        $stmt = db()->prepare("SELECT p.id, p.nom, p.prix, p.stock, p.categorie_id, p.description, p.statut, p.image, c.id as categoryId, c.nom as category FROM produits p INNER JOIN categories c ON c.id = p.categorie_id WHERE p.id = ?");
        $stmt->execute([$id]);

        $stmt->setFetchMode(PDO::FETCH_CLASS, Produit::class);

        $produit = $stmt->fetchAll();
        return $produit;
    }

    /**
     * Ajoute un nouveau produit à la base de données 
     * 
     * @param array $postData le post du produit
     */
    public function createProduct($postData)
    {
        $sql = db()->prepare("INSERT into produits (nom, prix, stock, description, categorie_id, image, statut) VALUES (:nom, :prix, :stock, :description, :category_id, :image, :statut)");
        $sql->execute($postData);
    }

    /**
     * Modifie un produit
     * 
     * @param array $postData le post du produit
     */
    public function updateProduit($postData)
    {
        $sql = db()->prepare("UPDATE produits SET nom = :nom, prix = :prix, stock = :stock, description = :description, categorie_id = :category_id, image = :image WHERE id = :id");

        $sql->execute($postData);
    }

    /**
     * Supprime un produit
     * 
     * @param int $id l'id du produit
     */
    public function deleteProduit($id)
    {
        $sql = db()->prepare("DELETE FROM produits WHERE id = ?");
        $sql->execute([$id]);
    }

    /**
     * Récupère les catégories des produits
     */
    public function getCategories()
    {
        $sql = "SELECT * FROM categories WHERE statut = 1";
        $stmt = db()->query($sql);

        $stmt->setFetchMode(PDO::FETCH_CLASS, Category::class);

        $categories = $stmt->fetchAll();

        return $categories;
    }

    /**
     * met les catégories dans tableau associatif
     */
    public function getCategoriesLookup()
    {
        $categories = $this->getCategories();
        $options = [];

        foreach ($categories as $category) {
            $options[$category->getId()] = $category->getNom();
        }

        return $options;
    }

    /**
     * Met ajour le status d'un produit
     * 
     * @param int $id l'id du produit
     * @param int $statut le statut du produit
     */

    public function updateStatut($id, $statut)
    {
        $sql = db()->prepare("UPDATE produits SET statut = :statut WHERE id = :id");

        $sql->execute([
            'id' => $id,
            'statut' => $statut,
        ]);
    }
}
